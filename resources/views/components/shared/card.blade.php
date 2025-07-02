<div class="container my-5">
    <div class="row justify-content-evenly">
        @foreach ($articles as $article)
            <div class="col-12 col-md-3">
                <div class="card">
                    <img src="{{ Storage::url($article->image) }}" class="card-img-top"
                         alt="Immagine dell'articolo: {{ $article->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-subtitle">{{ $article->subtitle }}</p>
                        
                        @if ($article->category)
                        <p class="small text-muted">
                            Categoria: 
                            <a href="{{ route('article.byCategory', $article->category) }}" class="text-capitalize text-muted">
                                {{ $article->category->name }}
                            </a>
                        </p>
                        @else
                        <p class="small text-muted">Nessuna categoria</p>
                        @endif

                        <p class="fs-5">Redattore: 
                            <a href="{{ route('article.byUser', $article->user) }}" class="text-capitalize fw-bold text-muted">
                                {{ $article->user->name }}
                            </a>
                        </p>

                        <div class="tags mt-2">
                            @foreach ($article->tags as $tag)
                                <span class="badge bg-dark me-1">#{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <p>Redatto il {{ $article->created_at->format('d/m/Y') }} <br>
                            da {{ $article->user->name }}</p>
                        <a href="{{ route('article.show', $article) }}" class="btn btn-outline-secondary">Leggi</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
