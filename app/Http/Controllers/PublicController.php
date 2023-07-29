<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage()
    {
        $article = Article::orderBy('created_at', 'desc')->take(4)->get_browser;
        return view('welcome', compact('articles'));
    }
}