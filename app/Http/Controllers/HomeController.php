<?php

namespace BristolSU\Playground\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Show the home page
 */
class HomeController extends Controller
{

    /**
     * Show the homepage
     *
     * @return View|Factory
     */
    public function index()
    {
        return view('pages.module.index');
    }

}
