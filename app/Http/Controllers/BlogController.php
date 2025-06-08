<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index(){
        return view('blogs.index');
    }


    public function singout(){
        Auth::logout();
        session()->invalidate();
        session()->regenerate();
        session()->regenerateToken();
        
        return redirect()->route('blogs.index');
    }
}
