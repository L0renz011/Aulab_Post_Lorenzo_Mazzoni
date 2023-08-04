<?php

namespace App\Http\Controllers;

use App\Mail\CareerRequestMail;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;



class PublicController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('homepage');
    }
    
    public function homepage()
    {
        $article = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();
        return view('welcome', compact('articles'));
    }

    public function careers(){
        return view('careers');
    }

    public function careerSubmit(Request $request){
        $request->validate([
            'role' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Mail::to('admin@theaulabpost.it')->send(new CareerRequestMail(compact('role', 'email', 'message')));

        switch ($role) {
            case 'admin':
                $user->is_admin = NULL;
                break;

            case 'revisor':
                $user->is_revisor = NULL;
                break;

            case 'writer':
                $user->is_writer = NULL;
                break;
        }

        $user->update();

        return redirect(route('homepage'))->with('message', 'Grazie per averci contattato!');
    }

}