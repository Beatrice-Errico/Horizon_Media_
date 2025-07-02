<?php

namespace App\View\Components;

use Closure;
use App\Models\Article;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class CommentBox extends Component
{
  public Article $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function render(): View|Closure|string
    {
        return view('components.comment-box');
    }
}
