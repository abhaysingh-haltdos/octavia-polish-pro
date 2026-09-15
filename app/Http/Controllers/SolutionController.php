<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;

class SolutionController extends Controller
{
    /**
     * Display solutions directory
     */
    public function index(): View
    {
        return view('pages.solutions.index');
    }

    /**
     * Display single solution with strict 404
     */
    public function show(string $slug): View
    {
        $solutionsPath = storage_path('app/solutions.json');
        $allSolutions = File::exists($solutionsPath) ? json_decode(File::get($solutionsPath), true) : [];

        if (empty($allSolutions[$slug])) {
            abort(404);
        }

        return view('pages.solutions.show', [
            'solution' => $allSolutions[$slug],
            'slug' => $slug,
        ]);
    }
}
