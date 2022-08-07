<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index() 
    {
        return Article::all();
    }

    public function fetch(Request $request)
    {
        return Article::find($request->id);
    }

    public function post(Request $request)
    {
        $article = new Article;
        $article->title = $request->title;
        $article->description = $request->description;
        $article->save();

        return [$article->id];
    }
}
