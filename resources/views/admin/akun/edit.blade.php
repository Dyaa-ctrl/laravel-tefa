@extends('admin.layouts')

@section('content')
<div class="p-5">
    <h1 class="text-2xl font-bold mb-5">Edit Akun</h1>
    <a href="{{ route('admin.akun') }}" class="btn btn-primary mb-5">Kembali</a>

    <!-- Menampilkan Error -->
    @if($errors->any())
    <div class="alert alert-error mb-4">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Menampilkan Pesan Sukses -->
    @if(Session::has('success'))
    <div class="alert alert-success mb-4" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif

    <!-- Form untuk Mengupdate Data Akun -->
    <form action="{{ route('update', $akun->id) }}" method="POST" class="mb-6">
        @csrf
        @method('PUT')
        <h2 class="text-xl font-semibold mb-3">Data Akun</h2>
        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text">Nama Lengkap</span>
            </label>
            <input type="text" id="name" name="name" value="{{ $akun->name }}" class="input input-bordered" required>
        </div>

        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text">Hak Akses</span>
            </label>
            <select name="usertype" class="select select-bordered" required>
                <option {{ 'admin' == $akun->usertype ? 'selected' : '' }} value="admin">Admin</option>
                <option {{ 'ptk' == $akun->usertype ? 'selected' : '' }} value="ptk">PTK</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>

    <!-- Form untuk Mengupdate Email -->
    <form action="{{ route('UpdateEmail', $akun->id) }}" method="POST" class="mb-6">
        @csrf
        @method('PUT')
        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text">Email Address</span>
            </label>
            <input type="email" id="email" name="email" value="{{ $akun->email }}" class="input input-bordered" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Email</button>
    </form>

    <!-- Form untuk Mengupdate Password -->
    <form action="{{ route('updatePassword', $akun->id) }}" method="POST" class="mb-6">
        @csrf
        @method('PUT')
        <h2 class="text-xl font-semibold mb-3">Ubah Password</h2>
        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text">Password</span>
            </label>
            <input type="password" id="password" name="password" class="input input-bordered" required>
        </div>

        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text">Confirm Password</span>
            </label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="input input-bordered" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Password</button>
    </form>
</div>
@endsection
