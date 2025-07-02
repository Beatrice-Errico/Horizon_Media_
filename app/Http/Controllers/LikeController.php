<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
     public function toggle(Article $article)
    {
        $user = Auth::user();

        // Se l'ha già messo, lo toglie
        $like = $article->likes()->where('user_id', $user->id)->first();

        if ($like) {
            $like->delete();
        } else {
            $article->likes()->create([
                'user_id' => $user->id,
            ]);
        }

        return back();
    }
}
