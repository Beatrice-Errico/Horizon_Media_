<x-main-layout>
    <x-slot:title>Crea Articolo</x-slot:title>

    <!-- Hero -->
    <div class="bg-primary text-white py-5 mb-3" style="background: linear-gradient(135deg, #4a90e2 0%, #357ABD 100%)">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Inserisci un Articolo</h1>
            <p class="lead mt-2">Condividi la tua storia con il mondo</p>
        </div>
    </div>

    <!-- Immagine orizzontale decorativa sotto al titolo -->
    <div class="container mb-4">
        <img src="/storage/" alt="Banner" class="img-fluid rounded shadow-sm w-100 object-fit-cover" style="max-height: 300px;">
    </div>

    <!-- Form -->
    <div class="container-fluid px-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="form-3d-wrapper">
                <form method="POST" action="{{ route('article.store') }}" enctype="multipart/form-data" class="card bg-form-inner shadow-sm p-4 border-0">

                    @csrf

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="title" class="form-label fw-semibold">Titolo</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   name="title" id="title" value="{{ old('title') }}"
                                   placeholder="Inserisci il titolo dell'articolo" autofocus>
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="subtitle" class="form-label fw-semibold">Sottotitolo</label>
                            <input type="text" class="form-control @error('subtitle') is-invalid @enderror"
                                   name="subtitle" id="subtitle" value="{{ old('subtitle') }}"
                                   placeholder="Inserisci un sottotitolo">
                            @error('subtitle') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="body" class="form-label fw-semibold">Corpo del testo</label>
                        <textarea class="form-control @error('body') is-invalid @enderror"
                                  name="body" id="body" rows="8"
                                  placeholder="Scrivi qui il contenuto del tuo articolo">{{ old('body') }}</textarea>
                        @error('body') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="category_id" class="form-label fw-semibold">Categoria</label>
                            <select name="category_id" id="category_id"
                                    class="form-select @error('category_id') is-invalid @enderror">
                                <option value="" disabled selected>Seleziona una categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                        {{ ucfirst($category->name) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="tags" class="form-label fw-semibold">Tags</label>
                            <input type="text" class="form-control @error('tags') is-invalid @enderror"
                                   name="tags" id="tags" value="{{ old('tags') }}"
                                   placeholder="es: tecnologia, sport, cucina">
                            <small class="form-text text-muted fst-italic">Dividi ogni tag con una virgola</small>
                            @error('tags') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="image" class="form-label fw-semibold">Immagine</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                   name="image" id="image" accept="image/*">
                            @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary fw-semibold shadow-sm">
                            Inserisci Articolo
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bgcolor" style="padding-bottom: 200px;"></div>
</x-main-layout>
