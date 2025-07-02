@props(['articles'])

@if ($articles->count())
@foreach ($articles as $article)
<div class="nyt-card mb-4">
    <div class="nyt-card-text">
        <div class="nyt-meta">Articolo #{{ $article->id }} — {{ $article->created_at->format('d/m/Y') }}</div>

        <div class="nyt-card-title">{{ $article->title }}</div>
        <div class="nyt-card-subtitle">{{ $article->subtitle }}</div>

        <div class="nyt-meta">
            Categoria:
            <span class="text-muted">
                {{ $article->category?->name ?? 'Nessuna categoria' }}
            </span>
        </div>

        <div class="nyt-meta mb-2">
            @foreach ($article->tags as $tag)
            <span class="nyt-tag">#{{ $tag->name }}</span>
            @endforeach
        </div>
        <div class="d-flex flex-wrap gap-2 mt-3">
            <a href="{{ route('article.show', $article) }}" class="nyt-btn btn-dark">Leggi</a>
            <a href="{{ route('article.edit', $article) }}" class="nyt-btn btn-secondary">Modifica</a>
            <form action="{{ route('article.destroy', $article) }}" method="POST" class="d-inline" onsubmit="return confirm('Sei sicura di voler eliminare questo articolo?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="nyt-btn btn-danger">Elimina</button>
            </form>
        </div>


    </div>
</div>
@endforeach
@else
<p class="text-muted fst-italic">Nessun articolo disponibile in questa sezione.</p>
@endif