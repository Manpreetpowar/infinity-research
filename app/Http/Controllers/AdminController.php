<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Enquiry;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }

    public function dashboard()
    {
        $enquiriesCount = Enquiry::count();
        $recentEnquiries = Enquiry::latest()->take(5)->get();
        return view('admin.dashboard', compact('enquiriesCount', 'recentEnquiries'));
    }

    public function enquiries(Request $request)
    {
        $enquiries = Enquiry::orderBy('created_at', 'desc')->get();
        return view('admin.enquiries', compact('enquiries'));
    }

    public function settings()
    {
        $path = storage_path('app/cms.json');
        $cmsData = file_exists($path) ? (json_decode(file_get_contents($path), true) ?? []) : [];
        return view('admin.settings', compact('cmsData'));
    }

    public function updateSettings(Request $request)
    {
        $path = storage_path('app/cms.json');
        $cmsData = file_exists($path) ? (json_decode(file_get_contents($path), true) ?? []) : [];

        // request()->all() comes as [ 'field_key' => 'new_value' ]
        $inputs = $request->except(['_token', '_method']);

        foreach ($cmsData as $sectionKey => &$section) {
            if (isset($section['fields'])) {
                foreach ($section['fields'] as $fieldKey => &$field) {
                    if (isset($inputs[$fieldKey])) {
                        $value = $inputs[$fieldKey];

                        // Parse JSON strings back to arrays if the field expects it
                        if (in_array($field['type'], ['array', 'array_simple']) && is_string($value)) {
                            $decoded = json_decode($value, true);
                            if (json_last_error() === JSON_ERROR_NONE) {
                                $field['value'] = $decoded;
                            }
                        } else {
                            $field['value'] = $value;
                        }
                    }
                }
            }
        }

        file_put_contents($path, json_encode($cmsData, JSON_PRETTY_PRINT));

        return back()->with('success', 'JSON Settings updated successfully!');
    }
}
