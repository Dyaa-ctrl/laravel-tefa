@extends('admin.layouts')
@section('content')

    <br>
    <h1>Data Siswa</h1>
    <form action="" method="get">
        <div class="join">
            <input class="input input-bordered join-item" placeholder="Cari Data Disini" type="text" name="cari" />
            <input type="submit" value="Search" class="btn join-item rounded-r-full"></input>
        </div>
    </form>
    <br>
    <a class="btn btn-primary mb-5" href="{{ route('siswa.create') }}"> + Tambah Siswa</a>

    @if(Session::has('success'))
    <div class="alert alert-success text-white" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif

    <table class="table table-zebra">
        <tr>
            <th>Foto</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Kelas</th>
            <th>No Hp</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @forelse($siswas as $siswa)
        <tr>
            <td>
                <img src="{{ asset('storage/public/siswas/' . $siswa->image) }}" width="100px" height="100px">
            </td>
            <td>{{ $siswa->nis }}</td>
            <td>{{ $siswa->name }}</td>
            <td>{{ $siswa->email }}</td>
            <td>{{ $siswa->tingkatan }} {{ $siswa->jurusan }} {{ $siswa->kelas}}</td>
            <td>0{{ $siswa->hp}}</td>
            @if ($siswa->status==1)
            <td>Aktif</td>
            @else
            <td>Tidak Aktif</td>
            @endif
            <td>
                <form id="delete-form-{{ $siswa->id }}" action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                    <a class="btn btn-sm btn-info text-white" href="{{ route('siswa.show', $siswa->id) }}">SHOW</a>
                    <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-sm btn-error text-white"
                        onclick="confirmDelete({{ $siswa->id }})">HAPUS</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center">
                <p>Data Tidak Ditemukan</p>
                <a href="{{ route('siswa.index') }}">Kembali</a>
            </td>
        </tr>
        @endforelse
    </table>
    {{ $siswas->links() }}

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
