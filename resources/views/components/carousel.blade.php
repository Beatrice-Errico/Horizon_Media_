<div class="car w-100 my-3">
  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
    <div class="carousel-inner">
      @foreach($articles->chunk(2) as $idx => $chunk)
        <div class="carousel-item @if($idx === 0) active @endif">
          <div class="container">
            <div class="row g-2 align-items-stretch">
              @foreach($chunk as $article)
                <div class="col-12 col-md-6 d-flex">
                  <div class="card bg-dark text-white border-0 w-100">
                    <div class="ratio ratio-16x9">
                      <img src="{{ asset('storage/' . $article->image) }}"
                           class="card-img-top object-fit-cover"
                           alt="{{ $article->title }}">
                    </div>
                    <div class="card-img-overlay d-flex flex-column justify-content-end p-4"
                         style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                      <h5 class="card-title text-white">{{ $article->title }}</h5>
                      <p class="card-text text-light">{{ $article->subtitle }}</p>
                      <a href="{{ route('article.show', $article) }}" class="btn btn-outline-light btn-sm">Leggi</a>
                    </div>
                  </div>
                </div>
              @endforeach
              @for($i = 0; $i < 2 - $chunk->count(); $i++)
                <div class="col-12 col-md-6 d-none d-md-block"></div>
              @endfor
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Precedente</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Successivo</span>
    </button>
  </div>
</div>

<style>
.carousel-control-prev-icon,
.carousel-control-next-icon {
  background-image: none;
  font-size: 2rem;
  color: white;
}

.carousel-control-prev::after {
  content: '‹';
}

.carousel-control-next::after {
  content: '›';
}
</style>
