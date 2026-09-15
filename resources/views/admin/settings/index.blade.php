@extends('admin.layouts.app')

@section('title', 'System Settings')
@section('page-title', 'Site Settings')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header -->
    <div>
        <h1 class="text-lg font-bold text-white">System & Site Settings</h1>
        <p class="text-xs text-slate-400">Configure global website branding, communication channels, and notification integrations.</p>
    </div>

    <!-- Navigation Tabs -->
    <div class="flex items-center gap-2 border-b border-slate-800 pb-2 overflow-x-auto">
        @foreach(['general' => 'General Branding', 'contact' => 'Contact Info', 'social' => 'Social Channels', 'seo' => 'SEO & Tracking', 'email' => 'Email & Notifications'] as $grpKey => $grpLabel)
            <a href="{{ route('admin.settings.index', ['group' => $grpKey]) }}" class="px-4 py-2 rounded-xl text-xs font-semibold whitespace-nowrap transition-all {{ $group === $grpKey ? 'bg-amber-500/15 text-amber-400 border border-amber-500/30' : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
                {{ $grpLabel }}
            </a>
        @endforeach
    </div>

    <!-- Tabbed Settings Forms -->
    <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6">
        <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-5">
            @csrf
            <input type="hidden" name="group" value="{{ $group }}">

            @if($group === 'general')
                <!-- General Branding -->
                <div class="space-y-4">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-slate-300">Brand Identity</h2>

                    <div>
                        <label for="site_name" class="block text-xs font-semibold text-slate-200 mb-1">Company / Site Name</label>
                        <input
                            type="text"
                            id="site_name"
                            name="site_name"
                            value="{{ old('site_name', $settings['site_name']) }}"
                            required
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                        />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="site_logo" class="block text-xs font-semibold text-slate-200 mb-1">Main Logo URL</label>
                            <input
                                type="text"
                                id="site_logo"
                                name="site_logo"
                                value="{{ old('site_logo', $settings['site_logo']) }}"
                                class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 font-mono"
                            />
                        </div>

                        <div>
                            <label for="favicon" class="block text-xs font-semibold text-slate-200 mb-1">Favicon URL</label>
                            <input
                                type="text"
                                id="favicon"
                                name="favicon"
                                value="{{ old('favicon', $settings['favicon']) }}"
                                class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 font-mono"
                            />
                        </div>
                    </div>

                    <div>
                        <label for="address" class="block text-xs font-semibold text-slate-200 mb-1">Headquarters Physical Address</label>
                        <input
                            type="text"
                            id="address"
                            name="address"
                            value="{{ old('address', $settings['address']) }}"
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                        />
                    </div>
                </div>

            @elseif($group === 'contact')
                <!-- Contact Channels -->
                <div class="space-y-4">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-slate-300">Contact Channels</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="contact_email" class="block text-xs font-semibold text-slate-200 mb-1">Inquiry Contact Email</label>
                            <input
                                type="email"
                                id="contact_email"
                                name="contact_email"
                                value="{{ old('contact_email', $settings['contact_email']) }}"
                                required
                                class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                            />
                        </div>

                        <div>
                            <label for="contact_phone" class="block text-xs font-semibold text-slate-200 mb-1">Phone Line</label>
                            <input
                                type="text"
                                id="contact_phone"
                                name="contact_phone"
                                value="{{ old('contact_phone', $settings['contact_phone']) }}"
                                class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                            />
                        </div>
                    </div>
                </div>

            @elseif($group === 'social')
                <!-- Social Channels -->
                <div class="space-y-4">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-slate-300">Social Profiles</h2>

                    <div>
                        <label for="social_linkedin" class="block text-xs font-semibold text-slate-200 mb-1">LinkedIn Page URL</label>
                        <input
                            type="url"
                            id="social_linkedin"
                            name="social_linkedin"
                            value="{{ old('social_linkedin', $settings['social_linkedin']) }}"
                            placeholder="https://linkedin.com/company/..."
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 font-mono"
                        />
                    </div>

                    <div>
                        <label for="social_twitter" class="block text-xs font-semibold text-slate-200 mb-1">X / Twitter Handle or URL</label>
                        <input
                            type="url"
                            id="social_twitter"
                            name="social_twitter"
                            value="{{ old('social_twitter', $settings['social_twitter']) }}"
                            placeholder="https://twitter.com/..."
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 font-mono"
                        />
                    </div>
                </div>

            @elseif($group === 'seo')
                <!-- SEO & Analytics Defaults -->
                <div class="space-y-4">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-slate-300">Global SEO Defaults</h2>

                    <div>
                        <label for="default_meta_title" class="block text-xs font-semibold text-slate-200 mb-1">Default Site Title</label>
                        <input
                            type="text"
                            id="default_meta_title"
                            name="default_meta_title"
                            value="{{ old('default_meta_title', $settings['default_meta_title']) }}"
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                        />
                    </div>

                    <div>
                        <label for="default_meta_description" class="block text-xs font-semibold text-slate-200 mb-1">Default Meta Description</label>
                        <textarea
                            id="default_meta_description"
                            name="default_meta_description"
                            rows="2"
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                        >{{ old('default_meta_description', $settings['default_meta_description']) }}</textarea>
                    </div>

                    <div>
                        <label for="analytics_ga_id" class="block text-xs font-semibold text-slate-200 mb-1">Google Analytics ID</label>
                        <input
                            type="text"
                            id="analytics_ga_id"
                            name="analytics_ga_id"
                            value="{{ old('analytics_ga_id', $settings['analytics_ga_id']) }}"
                            placeholder="G-XXXXXXXXXX"
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 font-mono"
                        />
                    </div>
                </div>

            @elseif($group === 'email')
                <!-- Email & Notifications -->
                <div class="space-y-4">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-slate-300">Lead Notifications & SMTP</h2>

                    <div>
                        <label for="admin_notification_email" class="block text-xs font-semibold text-slate-200 mb-1">Lead Recipient Email</label>
                        <input
                            type="email"
                            id="admin_notification_email"
                            name="admin_notification_email"
                            value="{{ old('admin_notification_email', $settings['admin_notification_email']) }}"
                            placeholder="sales@octaviatechnologies.com"
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                        />
                        <p class="text-[10px] text-slate-500 mt-1">Address that receives email notifications when a prospect fills the contact form.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-3 border-t border-slate-800">
                        <div>
                            <label for="smtp_host" class="block text-xs font-semibold text-slate-200 mb-1">SMTP Host</label>
                            <input
                                type="text"
                                id="smtp_host"
                                name="smtp_host"
                                value="{{ old('smtp_host', $settings['smtp_host']) }}"
                                class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 font-mono"
                            />
                        </div>

                        <div>
                            <label for="smtp_port" class="block text-xs font-semibold text-slate-200 mb-1">SMTP Port</label>
                            <input
                                type="text"
                                id="smtp_port"
                                name="smtp_port"
                                value="{{ old('smtp_port', $settings['smtp_port']) }}"
                                class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 font-mono"
                            />
                        </div>

                        <div>
                            <label for="smtp_user" class="block text-xs font-semibold text-slate-200 mb-1">SMTP Username</label>
                            <input
                                type="text"
                                id="smtp_user"
                                name="smtp_user"
                                value="{{ old('smtp_user', $settings['smtp_user']) }}"
                                class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 font-mono"
                            />
                        </div>
                    </div>
                </div>
            @endif

            <div class="pt-4 border-t border-slate-800 flex justify-end">
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs transition-all shadow-lg shadow-amber-500/20">
                    Save Changes
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
