@props(['metaInfos', 'metaType'])

<table class="table table-striped table-hover mb-5">
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">N. di articoli collegati</th>
            <th scope="col">Aggiorna</th>
            <th scope="col">Cancella</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($metaInfos as $metaInfo)
            <tr>
                <th scope="row">{{ $metaInfo->id }}</th>
                <td>{{ $metaInfo->name }}</td>
                <td>{{ count($metaInfo->articles) }}</td>

                <td>
                    <form action="{{ $metaType == 'tags' 
                        ? route('admin.editTag', ['tag' => $metaInfo]) 
                        : route('admin.editCategory', ['category' => $metaInfo]) 
                    }}" method="POST" class="d-flex gap-2 align-items-center">
                        @csrf
                        @method('PUT')
                        <input 
                            type="text" 
                            value="{{ $metaInfo->name }}" 
                            name="name" 
                            placeholder="Nuovo nome" 
                            class="form-control form-control-sm"
                        >
                        <button type="submit" class="nyt-btn btn-secondary btn-sm">Aggiorna</button>
                    </form>
                </td>

                <td>
                    <form 
                        action="{{ $metaType == 'tags' 
                            ? route('admin.deleteTag', ['tag' => $metaInfo]) 
                            : route('admin.deleteCategory', ['category' => $metaInfo]) 
                        }}" 
                        method="POST" 
                        class="delete-form"
                    >
                        @csrf
                        @method('DELETE')
                        <button 
                            type="submit" 
                            class="nyt-btn btn-danger btn-sm delete-button" 
                            data-tag-name="{{ $metaInfo->name }}"
                        >
                            Elimina
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                const button = form.querySelector('.delete-button');
                const name = button?.dataset.tagName || 'questo elemento';

                Swal.fire({
                    title: `Eliminare "${name}"?`,
                    text: "Questa azione è irreversibile!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Sì, elimina',
                    cancelButtonText: 'Annulla'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
