<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
     public function store(Request $request, Article $article)
    {
        $request->validate([
            'body' => 'required|min:3'
        ]);

        $article->comments()->create([
            'user_id' => auth()->id(),
            'body' => $request->body,
        ]);

        return back()->with('message', 'Commento pubblicato con successo!');
    }
}
