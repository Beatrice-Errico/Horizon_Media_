<x-main-layout>
  <x-slot:title>Richieste</x-slot:title>

  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif

  <div class="container-fluid p-5 bg-secondary-subtle text-center">
    <div class="row justify-content-center">
      <div class="col-12">
        <h1 class="display-1">Bentornato, Amministratore {{ Auth::user()->name }}</h1>
      </div>
    </div>
  </div>

  {{-- Sezione richieste ruolo --}}
  @foreach ([
    ['title' => 'Amministratore', 'data' => $adminRequests],
    ['title' => 'Revisore', 'data' => $revisorRequests],
    ['title' => 'Redattore', 'data' => $writerRequests],
  ] as $section)
    <div class="container my-5">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2>Richieste per il ruolo di {{ $section['title'] }}</h2>
          <x-requests-table :roleRequests="$section['data']" role="{{ strtolower($section['title']) }}" />
        </div>
      </div>
    </div>
  @endforeach

  {{-- Sezione Tags --}}
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="d-flex justify-content-between flex-wrap gap-3 align-items-center mb-3">
          <h2 class="mb-0">Tutti i Tags</h2>
          <form action="{{ route('admin.storeTag') }}" method="POST" class="d-flex flex-grow-1 flex-md-grow-0">
            @csrf
            <input type="text" name="name" class="form-control me-2" placeholder="Inserisci un nuovo Tag">
            <button type="submit" class="nyt-btn btn-secondary">Inserisci</button>
          </form>
        </div>
        <x-metainfo-table :metaInfos="$tags" metaType="tags" />
      </div>
    </div>
  </div>

  {{-- Sezione Categorie --}}
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="d-flex justify-content-between flex-wrap gap-3 align-items-center mb-3">
          <h2 class="mb-0">Tutte le Categorie</h2>
          <form action="{{ route('admin.storeCategory') }}" method="POST" class="d-flex flex-grow-1 flex-md-grow-0">
            @csrf
            <input type="text" name="name" class="form-control me-2" placeholder="Inserisci una nuova categoria">
            <button type="submit" class="nyt-btn btn-secondary">Inserisci</button>
          </form>
        </div>
        <x-metainfo-table :metaInfos="$categories" metaType="categorie" />
      </div>
    </div>
  </div>



 <div class="bgcolor" style="padding-bottom: 200px;">
</x-main-layout>