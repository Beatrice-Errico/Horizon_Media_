<x-main-layout-animation>
  <x-slot:title>Home</x-slot:title>

  @if (session('alert'))
    <div class="alert alert-danger">{{ session('alert') }}</div>
  @endif

  <!-- HERO SECTION -->
  <x-hero-section :articles="$articles" />

  <!-- NEWS TICKER PRIMA DI TUTTO IL CONTENUTO -->
  <div class=" nyt-marquee-container mt-5 mb-4 mt-md-5 mb-md-5">
      <div class="nyt-marquee-track">
    <span >Le News!</span>
  </div>
  </div>

  <div class="nyt-typewriter-wrapper">
  <h2 class="nyt-typewriter-text" id="nytHeadline"></h2>
  </div>

  <!-- CAROUSEL -->
  <x-carousel :articles="$articles" />

  @if(session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif

  <!-- SOCIAL COMPONENT -->
  <x-shared.social />

  <!-- ANIMAZIONE ISCRITTI -->
  <x-animation-iscritti />

  <!-- CTA LAVORA CON NOI -->
  <div class="container my-4 position-relative">
    <img src="storage/LavoraConNoi.jpg" alt="Lavora con noi" class="img-fluid w-100 rounded shadow" style="max-height: 400px; object-fit: cover;">

    <div class="position-absolute start-0 top-50 translate-middle-y ps-4">
      <h2 class="text-white fw-bold shadow-text">
        Vuoi lavorare con noi?<br>Invia la tua candidatura!
      </h2>
    </div>

    <a href="{{ route('careers') }}" class="btn-lavora-bottom-end position-absolute">
      Lavora con noi!
    </a>
  </div>
    <div class="bgcolor" style="padding-bottom: 200px;"></div>
</x-main-layout-animation>
