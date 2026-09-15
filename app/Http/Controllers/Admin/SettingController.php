<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\AuditLogger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Display the settings manager.
     */
    public function index(Request $request): View
    {
        $group = $request->input('group', 'general');

        $settings = [
            // General
            'site_name' => Setting::get('site_name', 'Octavia Tech Solutions'),
            'site_logo' => Setting::get('site_logo', '/assets/octavia-logo.png'),
            'favicon' => Setting::get('favicon', '/favicon.ico'),
            'address' => Setting::get('address', '100 Enterprise Way, Suite 400, Tech City'),

            // Contact
            'contact_email' => Setting::get('contact_email', 'contact@octaviatechnologies.com'),
            'contact_phone' => Setting::get('contact_phone', '+1 (555) 123-4567'),

            // Social
            'social_linkedin' => Setting::get('social_linkedin', 'https://linkedin.com/company/octavia-tech'),
            'social_twitter' => Setting::get('social_twitter', 'https://twitter.com/octavia_tech'),

            // SEO
            'default_meta_title' => Setting::get('default_meta_title', 'Octavia Tech Solutions | Enterprise IT & AI Engineering'),
            'default_meta_description' => Setting::get('default_meta_description', 'Leading enterprise IT staff augmentation, custom software, and cloud engineering.'),
            'analytics_ga_id' => Setting::get('analytics_ga_id', 'G-XXXXXXX'),

            // Email & Notification
            'admin_notification_email' => Setting::get('admin_notification_email', 'sales@octaviatechnologies.com'),
            'smtp_enabled' => Setting::get('smtp_enabled', '0'),
            'smtp_host' => Setting::get('smtp_host', 'mail.octaviatechnologies.com'),
            'smtp_port' => Setting::get('smtp_port', '587'),
            'smtp_user' => Setting::get('smtp_user', 'notifications@octaviatechnologies.com'),
        ];

        return view('admin.settings.index', compact('settings', 'group'));
    }

    /**
     * Update configuration settings.
     */
    public function update(Request $request): RedirectResponse
    {
        $group = $request->input('group', 'general');
        $inputs = $request->except(['_token', 'group']);

        foreach ($inputs as $key => $val) {
            Setting::set($key, $val, $group);
        }

        AuditLogger::log('SETTINGS_UPDATED', "System settings updated in group: [{$group}]");

        return redirect()->route('admin.settings.index', ['group' => $group])
            ->with('success', 'Configuration settings updated successfully.');
    }
}
