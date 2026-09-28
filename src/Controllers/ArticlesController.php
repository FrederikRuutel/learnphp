<?php

namespace App\Controllers;


use App\Models\Article;

class ArticlesController
{
    public function index() {
        $articles = Article::all();
        $title = 'Articles';
        view('articles/index', compact('title', 'articles'));
    }

    public function create() {
        $title = 'New Article';
        view('articles/create', compact('title'));
    }

    public function store() {
        dump($_POST);
    }
}
