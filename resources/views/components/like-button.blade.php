<div>
@php
    $user = auth()->user();
    $hasLiked = $article->likes->contains('user_id', $user?->id);
@endphp

<form method="POST" action="{{ route('articles.like', $article) }}">
    @csrf
    <button class="btn btn-sm {{ $hasLiked ? 'btn-gradient-active' : 'btn-gradient' }}">
        {{ $hasLiked ? '💙 Ti piace' : '👍 Mi piace' }} ({{ $article->likes->count() }})
    </button>
</form>

</div>