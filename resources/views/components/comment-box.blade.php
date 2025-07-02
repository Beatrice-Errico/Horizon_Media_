<div>
<hr>
<h4>Commenti</h4>

@auth
<form method="POST" action="{{ route('comments.store', $article) }}" class="nyt-comment-form mt-3">
    @csrf
    <textarea name="body" class="form-control mb-2" rows="3" placeholder="Scrivi un commento..."></textarea>
    <button type="submit" class="btn btn-dark">Invia</button>
</form>
@else
<p>Per commentare devi <a href="{{ route('login') }}">accedere</a>.</p>
@endauth

@foreach ($article->comments()->latest()->get() as $comment)
    <div class="nyt-comment">
        <p><strong>{{ $comment->user->name }}</strong> ha scritto:</p>
        <p>{{ $comment->body }}</p>
        <small class="text-muted">{{ $comment->created_at->format('d/m/Y H:i') }}</small>
    </div>
@endforeach

</div>