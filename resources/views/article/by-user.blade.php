<x-main-layout>
  <x-slot name="title">Filtro utente</x-slot>



  <div class="container my-5">
    <div class="row">
      <div class="col-12">
        @foreach ($articles as $article)
          <div class="nyt-card">
            <div class="nyt-card-text">
              <div class="nyt-meta">{{ $article->readDuration() }} MIN READ</div>
              <div class="nyt-card-title">{{ $article->title }}</div>
              <div class="nyt-card-subtitle">{{ $article->subtitle }}</div>

              @if ($article->category)
                <div class="nyt-meta">
                  Categoria: 
                  <a href="{{ route('article.byCategory', $article->category) }}" 
                     class="text-muted text-decoration-none text-capitalize">
                    {{ $article->category->name }}
                  </a>
                </div>
              @else
                <div class="nyt-meta">Nessuna categoria</div>
              @endif

              <div class="nyt-meta">
                @foreach ($article->tags as $tag)
                  <span class="nyt-tag">#{{ $tag->name }}</span>
                @endforeach
              </div>

              <div class="nyt-author">
                Redattore:
                <a href="{{ route('article.byUser', $article->user) }}" 
                   class="fw-bold text-muted text-capitalize text-decoration-none">
                  {{ $article->user->name }}
                </a>
              </div>

              <div class="nyt-footer">
                Pubblicato il {{ $article->created_at->format('d/m/Y') }}
              </div>

              <a href="{{ route('article.show', $article) }}" class="btn btn-outline-secondary mt-2">
                Leggi
              </a>
            </div>

            <div class="nyt-img-container">
              <img src="{{ Storage::url($article->image) }}" 
                   alt="Immagine: {{ $article->title }}" 
                   class="nyt-img">
              <div class="nyt-footer">via {{ $article->user->name }}</div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

    <div class="bgcolor" style="padding-bottom: 200px;"></div>

</x-main-layout>
