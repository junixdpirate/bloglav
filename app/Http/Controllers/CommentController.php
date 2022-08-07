<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index(Request $request, $articleId) 
    {
        return Comment::where('article_id', $articleId)->orderBy('created_at')->get();
    }

    public function post(Request $request)
    {
        $lastLevel = (int) Comment::where('article_id', $request->articleId)->max('level');       
        $comment = new Comment;
        $comment->article_id = $request->articleId;   
        $comment->parent_id = 0;     
        $comment->level = $lastLevel < 3 ? $lastLevel+1 : $lastLevel;
        $comment->message = $request->message;
        $comment->save();

        return [$comment->id];
    }

}
