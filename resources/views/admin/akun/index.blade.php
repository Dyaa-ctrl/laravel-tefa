@extends('admin.layouts')

@section('content')
<div class="p-5">
  <h1 class="text-3xl font-bold">Data User</h1>
 

  <div class="mt-6">
    <a href="{{ route('akun.create') }}" class="btn btn-primary">Tambah User</a>
  </div>

  @if(Session::has('success'))
  <div class="alert alert-success mt-4" role="alert">
      {{ Session::get('success') }}
  </div>
  @endif

  <div class="overflow-x-auto mt-6">
    <table class="table table-zebra w-full">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Email</th>
          <th>Role</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($users as $user)
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->usertype }}</td>
          <td>
            <form action="{{ route('akun.destroy', $user->id) }}" method="POST" id="delete-form-{{ $user->id }}">
              <a href="{{ route('akun.edit', $user->id) }}" class="btn btn-sm btn-info text-white">EDIT</a>
              @csrf
              @method('DELETE')
              <button type="button" 
                      class="btn btn-sm btn-error text-white"
                      onclick="confirmDelete({{ $user->id }})">
                DELETE
              </button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="4" class="text-center">Tidak ada data pengguna</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function confirmDelete(id) {
    Swal.fire({
      title: 'Yakin ingin menghapus?',
      text: "Data yang dihapus tidak dapat dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById(`delete-form-${id}`).submit();
      }
    })
  }
</script>
@endsection
