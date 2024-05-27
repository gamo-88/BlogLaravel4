<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $articles= Article::orderBy('id', 'desc')->get();
        return view('pages.home', compact('articles'));
    }
}
