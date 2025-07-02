@props(['roleRequests', 'role'])

<div class="table-responsive mt-4">
  <table class="table align-middle">
    <thead class="bg-dark text-white">
      <tr class="text-uppercase text-muted small">
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col" class="text-center">Azione</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @foreach ($roleRequests as $user)
        <tr class="border-bottom">
          <th scope="row">{{ $user->id }}</th>
          <td class="fw-semibold text-capitalize font-serif">{{ $user->name }}</td>
          <td class="text-muted">{{ $user->email }}</td>
          <td class="text-center">
            @switch($role)
              @case('amministratore')
                <form action="{{ route('admin.setAdmin', $user) }}" method="POST" class="d-inline">
                  @csrf @method('PATCH')
                  <button type="submit" class="btn-admin">Attiva amministratore</button>
                </form>
                @break
              @case('revisore')
                <form action="{{ route('admin.setRevisor', $user) }}" method="POST" class="d-inline">
                  @csrf @method('PATCH')
                  <button type="submit" class="btn-admin">Attiva revisore</button>
                </form>
                @break
              @case('redattore')
                <form action="{{ route('admin.setWriter', $user) }}" method="POST" class="d-inline">
                  @csrf @method('PATCH')
                  <button type="submit" class="btn-admin">Attiva redattore</button>
                </form>
                @break
            @endswitch
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
