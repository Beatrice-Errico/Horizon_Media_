<x-main-layout>
  <x-slot:title>Revisor</x-slot:title>

  @if (session('message'))
    <div class="alert alert-success text-center my-4">
      {{ session('message') }}
    </div>
  @endif

  <div class="container-fluid py-5 bg-light border-top border-bottom">
    <div class="row justify-content-center">
      <div class="col-12 text-center">
        <h1 class="display-4 font-serif">Bentornato, Revisore {{ Auth::user()->name }}</h1>
      </div>
    </div>
  </div>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="nyt-section-title border-bottom pb-2 mb-4">Articoli da revisionare</h2>
        <x-articles-table :articles="$unrevisionedArticles" />
      </div>
    </div>
  </div>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="nyt-section-title border-bottom pb-2 mb-4">Articoli pubblicati</h2>
        <x-articles-table :articles="$acceptedArticles" />
      </div>
    </div>
  </div>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="nyt-section-title border-bottom pb-2 mb-4">Articoli respinti</h2>
        <x-articles-table :articles="$rejectedArticles" />
      </div>
    </div>
  </div>
</x-main-layout>
