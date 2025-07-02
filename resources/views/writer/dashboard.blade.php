<x-main-layout>
  <x-slot:title>Writer</x-slot:title>

  <div class="container-fluid py-5 bg-light text-center border-bottom">
    <h1 class="display-4" style="font-family: Georgia, serif;">
      Bentornato, {{ Auth::user()->name }}
    </h1>
    <p class="text-muted fst-italic">La tua area redazionale personale</p>
  </div>

  <div class="container my-5">
    <div class="mb-5">
      <h2 class="mb-3" style="font-family: Georgia, serif;">🕒 In attesa di revisione</h2>
      <x-writer-articles-table :articles="$unrevisionedArticles" />
    </div>

    <div class="mb-5">
      <h2 class="mb-3" style="font-family: Georgia, serif;">✅ Articoli pubblicati</h2>
      <x-writer-articles-table :articles="$acceptedArticles" />
    </div>

    <div class="mb-5">
      <h2 class="mb-3 text-danger" style="font-family: Georgia, serif;">❌ Articoli respinti</h2>
      <x-writer-articles-table :articles="$rejectedArticles" />
    </div>
  </div>

  @if (session('message'))
    <div class="container">
      <div class="alert alert-success">
        {{ session('message') }}
      </div>
    </div>
  @endif

<div class="bgcolor" style="padding-bottom: 200px;"></div>

</x-main-layout>