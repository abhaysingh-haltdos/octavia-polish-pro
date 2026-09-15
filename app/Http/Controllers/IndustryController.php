<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;

class IndustryController extends Controller
{
    /**
     * Display industries directory
     */
    public function index(): View
    {
        return view('pages.industries.index');
    }

    /**
     * Display single industry vertical with strict 404
     */
    public function show(string $slug): View
    {
        $industriesPath = storage_path('app/industries.json');
        $allIndustries = File::exists($industriesPath) ? json_decode(File::get($industriesPath), true) : [];

        if (empty($allIndustries[$slug])) {
            abort(404);
        }

        return view('pages.industries.show', [
            'industry' => $allIndustries[$slug],
            'slug' => $slug,
        ]);
    }
}
