<x-main-layout>
  <x-slot name="title">Articolo</x-slot>

  <div class="container my-5">
    <div class="row">

      <!-- COLONNA SINISTRA: ARTICOLO PRINCIPALE -->
      <div class="col-12 col-md-8">
        <h1 class="nyt-title">{{ $article->title }}</h1>
        <h2 class="nyt-subtitle">{{ $article->subtitle }}</h2>

        <div class="nyt-meta-info">
          @if ($article->category)
            <span>
              Categoria:
              <a href="{{ route('article.byCategory', $article->category) }}" class="nyt-meta-link">
                {{ $article->category->name }}
              </a>
            </span>
          @else
            <span class="text-muted">Nessuna categoria</span>
          @endif

          <span>
            Redattore:
            <a href="{{ route('article.byUser', $article->user) }}" class="nyt-meta-link">
              {{ $article->user->name }}
            </a>
          </span>

          <span class="text-muted">
            Pubblicato il {{ $article->created_at->format('d/m/Y') }}
          </span>
        </div>

        <div class="nyt-image-container">
          <img src="{{ Storage::url($article->image) }}" alt="Immagine: {{ $article->title }}">
        </div>

        <div class="nyt-tags mb-3">
          @foreach ($article->tags as $tag)
            <span class="nyt-tag">#{{ $tag->name }}</span>
          @endforeach
        </div>

        <article class="nyt-body">
          {{ $article->body }}
        </article>

        @if (Auth::user() && Auth::user()->is_revisor)
          <div class="d-flex justify-content-center gap-3 mt-5">
            <form action="{{ route('revisor.acceptArticle', $article) }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-success">Accetta l'articolo</button>
            </form>
            <form action="{{ route('revisor.rejectArticle', $article) }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-danger">Rifiuta l'articolo</button>
            </form>
          </div>
        @endif

        <div class="text-center mt-5">
          <a href="{{ route('article.index') }}" class="nyt-link">&larr; Torna alla lista degli articoli</a>
        </div>

        <x-like-button :article="$article" />
        <x-comment-box :article="$article" />
      </div>

      <!-- COLONNA DESTRA: ARTICOLI CORRELATI -->
      <div class="col-12 col-md-4">
        @if($relatedArticles->count())
          <h4 class="fs-5 mb-3">Articoli correlati</h4>
          @foreach ($relatedArticles as $relatedArticle)
            <div class="nyt-card mb-4 pb-4 border-bottom">
              <div class="nyt-card-text">
                <h5 class="nyt-card-title">
                  <a href="{{ route('article.show', $relatedArticle) }}" class="nyt-link">
                    {{ $relatedArticle->title }}
                  </a>
                </h5>
                <p class="nyt-meta">
                  di <span class="nyt-author">{{ $relatedArticle->user->name }}</span><br>
                  {{ $relatedArticle->created_at->format('d M Y') }}
                </p>
                <p class="nyt-card-subtitle">
                  {{ Str::limit($relatedArticle->subtitle, 80) }}
                </p>
              </div>
            </div>
          @endforeach
        @endif
      </div>

    </div>
  </div>
  
    <div class="bgcolor" style="padding-bottom: 200px;"></div>
</x-main-layout>
