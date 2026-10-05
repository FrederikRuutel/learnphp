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
        $tmp = $_FILES['image']['tmp_name'];
        $ext = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
        $uploads = __DIR__ . '/../../public/uploads/';
        do {
            $filename = md5($_FILES['image']['name'] . microtime() . rand(PHP_INT_MIN, PHP_INT_MAX)) . ".$ext";
        } while(file_exists($uploads . $filename));
        move_uploaded_file($tmp, $uploads . $filename);
        $article = new Article();
        $article->title = $_POST['title'];
        $article->body = $_POST['body'];
        $article->date = $_POST['date'];
        $article->author = $_POST['author'];
        $article->save();
        redirect('/admin/articles');
    }

    public function view() {
        $article = Article::find($_GET['id']);
        if($article) {
            view('articles/view', compact('article'));
        } else {
            echo 404;
        }
    }

    public function edit() {
        $article = Article::find($_GET['id']);
        if($article) {
            view('articles/edit', compact('article'));
        } else {
            echo 404;
        }
    }

    public function update() {
        $article = Article::find($_GET['id']);
        $article->title = $_POST['title'];
        $article->body = $_POST['body'];
        $article->date = $_POST['date'];
        $article->author = $_POST['author'];
        $article->save();
        redirect('/admin/articles');
    }

    public function delete() {
        $article = Article::find($_GET['id']);
        if($article) {
            $article->delete();
            redirect('/admin/articles');
        } else {
            echo 404;
        }
    }
}
