<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\TyperTitle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::first();
        $typerTitles = TyperTitle::all();
        return view('frontend.home', compact('hero', 'typerTitles'));
    }

    public function showPortfolio()
    {
        return view('frontend.portfolio-details');
    }

    public function showBlog()
    {
        return view('frontend.blog-details');
    }

    public function blog()
    {
        return view('frontend.blog');
    }

    public function contact()
    {

    }
}
