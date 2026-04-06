<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'hero_title_1' => 'Become a',
            'hero_title_highlight' => 'Smart Trader',
            'hero_title_2' => '& Smart Investor',
            'hero_subtitle' => 'Premium Trading & Investment Training',
            'hero_date_text' => 'Starting',
            'hero_date_value' => '1 March 2025',
            'hero_features' => json_encode([
                ['icon' => 'fa-check-square', 'text' => "Live Market<br>Training"],
                ['icon' => 'fa-check-square', 'text' => "Expert<br>Mentors"],
                ['icon' => 'fa-check-square', 'text' => "Limited<br>Seats"],
            ]),
            'contact_phone' => '9779515400',
            'contact_address' => 'F-427, FF, Wingtrill Cafe Building,<br>Phase 8B, Mohali',

            'about_title' => 'Us',
            'about_content_1' => "Welcome to <strong>Infinity Capital Research</strong>, India's premier trading coaching platform. We are dedicated to helping individuals become smart traders and investors through our premium training programs.",
            'about_content_2' => 'With a focus on practical learning, live market sessions, and expert mentorship, we empower you with the strategies and knowledge needed to achieve financial success in the stock, forex, and crypto markets.',

            'courses' => json_encode([
                ['icon' => 'fa-chart-line', 'title' => "Price Action<br>Trading"],
                ['icon' => 'fa-chart-pie', 'title' => "Futures &<br>Options"],
                ['icon' => 'fa-boxes-stacked', 'title' => "Commodity<br>Market"],
                ['icon' => 'fa-bitcoin', 'title' => "Crypto &<br>Forex"],
                ['icon' => 'fa-sack-dollar', 'title' => "Investment<br>Strategies"]
            ]),

            'syllabus_list' => json_encode([
                "Price Action Trading Strategies",
                "Equity Derivatives (Futures & Options)",
                "Profitable Options Strategies",
                "Commodity & Global Market Analysis",
                "Short-Term Momentum Trading",
                "Advanced Trading Techniques",
                "Crypto & Forex Fundamentals"
            ]),

            'why_us_features' => json_encode([
                ['icon' => '📊', 'title' => "Live Market<br>Sessions"],
                ['icon' => '🎓', 'title' => "Certified<br>Trainers"],
                ['icon' => '🧑‍🏫', 'title' => "Personal<br>Attention"],
                ['icon' => '⚙️', 'title' => "100% Practical<br>Learning"]
            ])
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key, 'group' => 'home'],
                ['value' => is_string($value) && is_array(json_decode($value, true)) && json_last_error() === JSON_ERROR_NONE ? json_decode($value, true) : $value]
            );
        }
    }
}
