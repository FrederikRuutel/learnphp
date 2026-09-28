<?php

namespace App\Controllers;


use App\Models\Article;
use App\Models\User;

class PublicController
{
    public function index()
    {
        
        $articles = Article::all();
        $title = 'World';
        view('index', compact('title', 'articles'));
    }

    public function us()
    {
        $articles = Article::all();
        $title = 'U.S';
        view('us', compact('title', 'articles'));
    }

    public function forms()
    {
        view('forms');
    }

    public function answer()
    {
        dump($_GET);
        dump($_POST);
    }
}
