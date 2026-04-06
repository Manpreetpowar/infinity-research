<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnquiryMail;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'course' => 'required|string',
            'message' => 'nullable|string',
        ]);

        // Save to Database
        Enquiry::create($validated);

        // Send Email
        Mail::to('diwedihitesh0@gmail.com')->send(new EnquiryMail($validated));

        if ($request->ajax()) {
            return response()->json(['message' => 'Enquiry sent successfully!']);
        }

        return back()->with('success', 'Enquiry sent successfully!');
    }
}
