<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Render website landing page
     */
    public function index(): View
    {
        return view('pages.home');
    }
}
