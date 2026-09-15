<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    /**
     * Display about us page
     */
    public function about(): View
    {
        return view('pages.about-us');
    }

    /**
     * Render a CMS Page model in legal/content view
     */
    public function showCmsPage(Page $page): View
    {
        if ($page->status !== 'published') {
            abort(404);
        }

        $page->load('seoMeta');

        return view('pages.legal', [
            'page' => $page,
            'title' => $page->title,
            'content' => $page->content,
            'lastUpdated' => $page->updated_at ? $page->updated_at->format('F Y') : 'January 2026',
            'seoMeta' => $page->seoMeta,
        ]);
    }

    /**
     * Display privacy policy
     */
    public function privacy(): View
    {
        $page = Page::where('slug', 'privacy-policy')->where('status', 'published')->first();
        if ($page) {
            return $this->showCmsPage($page);
        }

        return view('pages.legal', [
            'title' => 'Privacy Policy',
            'lastUpdated' => 'January 2026',
            'sections' => [
                ['heading' => '1. Overview', 'content' => 'At Octavia Tech Solutions, we respect your privacy and are committed to safeguarding personal data in compliance with GDPR, CCPA, and global privacy standards.'],
                ['heading' => '2. Information We Collect', 'content' => 'We collect information you provide directly through our contact and consultation forms, including name, corporate email, phone number, company name, and project specifications.'],
                ['heading' => '3. Use of Information', 'content' => 'Collected data is strictly used to evaluate enterprise project requirements, respond to customer inquiries, provide architectural proposals, and send quarterly engineering newsletters.'],
                ['heading' => '4. Data Protection & Security', 'content' => 'We implement ISO 27001 certified physical, technical, and administrative safeguards to protect your confidential information against unauthorized access, loss, or disclosure.'],
                ['heading' => '5. Contact Us', 'content' => 'If you have questions regarding this Privacy Policy, please contact our Data Protection Officer at privacy@octaviatechnologies.com.']
            ]
        ]);
    }

    /**
     * Display terms of service
     */
    public function terms(): View
    {
        $page = Page::where('slug', 'terms-of-service')->where('status', 'published')->first();
        if ($page) {
            return $this->showCmsPage($page);
        }

        return view('pages.legal', [
            'title' => 'Terms of Service',
            'lastUpdated' => 'January 2026',
            'sections' => [
                ['heading' => '1. Acceptance of Terms', 'content' => 'By accessing and utilizing the website and engineering services of Octavia Tech Solutions, you agree to be bound by these Terms of Service and applicable laws.'],
                ['heading' => '2. Intellectual Property', 'content' => 'All client software deliverables, bespoke source code, and custom architectures engineered under formal Master Services Agreements (MSA) are the sole and exclusive intellectual property of the client.'],
                ['heading' => '3. Limitation of Liability', 'content' => 'Octavia Tech Solutions shall not be liable for indirect, incidental, or consequential damages resulting from the use or inability to use this platform.'],
                ['heading' => '4. Governing Law', 'content' => 'These Terms shall be governed by and construed in accordance with the laws of the United States without regard to conflict of law provisions.']
            ]
        ]);
    }

    /**
     * Display cookie policy
     */
    public function cookie(): View
    {
        $page = Page::where('slug', 'cookie-policy')->where('status', 'published')->first();
        if ($page) {
            return $this->showCmsPage($page);
        }

        return view('pages.legal', [
            'title' => 'Cookie Policy',
            'lastUpdated' => 'January 2026',
            'sections' => [
                ['heading' => '1. What Are Cookies', 'content' => 'Cookies are small text files placed on your device to ensure optimal platform functionality, analyze traffic, and preserve user preferences.'],
                ['heading' => '2. How We Use Cookies', 'content' => 'We use necessary cookies for site navigation, security verification, and performance analytics to understand user interactions with our engineering content.'],
                ['heading' => '3. Managing Preferences', 'content' => 'You can configure your browser settings to refuse or delete cookies at any time without impacting basic website accessibility.']
            ]
        ]);
    }

    /**
     * Display platform sitemap
     */
    public function sitemap(): View
    {
        $page = Page::where('slug', 'sitemap')->where('status', 'published')->first();
        if ($page) {
            return $this->showCmsPage($page);
        }

        return view('pages.legal', [
            'title' => 'Platform Sitemap',
            'lastUpdated' => 'January 2026',
            'sections' => [
                ['heading' => 'Core Pages', 'content' => 'Home (/), About Us (/about-us), Contact (/contact), Case Studies (/case-studies), Insights & Blog (/blog), Industries Directory (/industries), Solutions Hub (/solutions), Services Catalog (/services).']
            ]
        ]);
    }
}
