<table class="table table-striped table-hover">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titolo</th>
      <th scope="col">Sottotitolo</th>
      <th scope="col">Redattore</th>
      <th scope="col">Azioni</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($articles as $article)
      <tr>
        <th scope="row">{{ $article->id }}</th>
        <td>{{ $article->title }}</td>
        <td>{{ $article->subtitle }}</td>
        <td>{{ $article->user->name }}</td>
        <td class="d-flex flex-wrap gap-2">

          {{-- Pulsante "Leggi articolo" sempre disponibile --}}
          <a href="{{ route('article.show', $article) }}" class="btn btn-secondary">Leggi</a>

          {{-- Se è già stato revisionato, mostra "Riporta in revisione" --}}
          @if (!is_null($article->is_accepted))
            <form action="{{ route('revisor.undoArticle', $article) }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-warning">Riporta in revisione</button>
            </form>
          @else
            {{-- Se non è stato ancora revisionato, mostra "Pubblica" e "Respingi" --}}
            <form action="{{ route('revisor.acceptArticle', $article) }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-success">Pubblica</button>
            </form>

            <form action="{{ route('revisor.rejectArticle', $article) }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-danger">Respingi</button>
            </form>
          @endif

        </td>
      </tr>
    @endforeach
  </tbody>
</table>
