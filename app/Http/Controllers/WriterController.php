<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class WriterController extends Controller
{
    public function dashboard(){
        $acceptedArticles = Article::where('user.id', Auth::user()->id)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        $rejectedArticles = Article::where('user.id', Auth::user()->id)->where('is_accepted', false)->orderBy('created_at', 'desc')->get();
        $unrevisioneArticles = Article::where('user.id', Auth::user()->id)->where('is_accepted', NULL)->orderBy('created_at', 'desc')->get();

        return view('writer.dashboard', compact('acceptedArticles', 'rejectedArticles', 'unrevisioneArticles'));
    }
}
