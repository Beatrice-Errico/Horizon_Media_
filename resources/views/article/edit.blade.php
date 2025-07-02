<x-main-layout>
<x-slot:title>Modifica Articolo</x-slot:title>
<div class="container-fluid p-5 bg-secondary-subtle text-center">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="my-5">Modifica l'articolo</h1>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form action="{{route('article.update', $article)}}" method="POST" class="card p-3 shadow" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Titolo --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ $article->title }}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Sottotitolo --}}
                <div class="mb-3">
                    <label for="subtitle" class="form-label">Sottotitolo</label>
                    <input type="text" name="subtitle" class="form-control" id="subtitle" value="{{ $article->subtitle }}">
                    @error('subtitle')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Immagine attuale --}}
                <div class="mb-3">
                    <label class="form-label">Immagine Attuale:</label>
                    <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="w-50 d-flex">
                </div>

                {{-- Nuova immagine --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Nuova Immagine</label>
                    <input type="file" name="image" class="form-control" id="image">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Categoria --}}
                <div class="mb-3">
                    <label for="category" class="form-label">Categoria</label>
                    <select name="category_id" id="category" class="form-control">
                        <option selected disabled>Seleziona categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($article->category_id == $category->id) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Tags --}}
                <div class="mb-3">
                    <label for="tags" class="form-label">Tags (virgola)</label>
                    <input type="text" name="tags" class="form-control" id="tags"
                           value="{{ $article->tags->implode('name', ', ') }}">
                    <span class="small text-muted">Scrivi ogni tag con una virgola</span>
                    @error('tags')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Corpo --}}
                <div class="mb-3">
                    <label for="body" class="form-label">Corpo del testo</label>
                    <textarea name="body" class="form-control" id="body" cols="30" rows="7">{{ $article->body }}</textarea>
                    @error('body')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Bottoni --}}
                <div class="d-flex justify-content-center flex-column align-items-center">
                    <button type="submit" class="btn btn-outline-secondary">Modifica articolo</button>
                    <a href="{{ route('home') }}" class="text-secondary mt-2">Torna alla home</a>
                </div>
            </form>
            <form action = "{{route('article.update', $article)}}" method="POST" class="card p-5 shadow" enctype="multipart/form-data"></form>
            @csrf
            @method('PUT')
        </div>
    </div>
</div>
    <div class="bgcolor" style="padding-bottom: 200px;"></div>
</x-main-layout>