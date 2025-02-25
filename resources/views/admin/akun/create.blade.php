@extends('admin.layouts')

@section('content')
<div class="p-5">
    <h1 class="text-2xl font-bold mb-5">Tambah User</h1>
    <div class="mb-4">
       
        <a href="{{ route('admin.akun') }}" class="btn btn-primary">Kembali</a>
    </div>

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

    <!-- Form Tambah User -->
    <form action="{{ route('akun.create') }}" method="POST" enctype="multipart/form-data" class="form-control">
        @csrf

        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text">Nama Lengkap</span>
            </label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="input input-bordered" required>
        </div>

        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text">Email Address</span>
            </label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="input input-bordered" required>
        </div>

        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text">Password</span>
            </label>
            <input type="password" name="password" id="password" class="input input-bordered" required>
        </div>

        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text">Confirm Password</span>
            </label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="input input-bordered" required>
        </div>

        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text">Role</span>
            </label>
            <select name="usertype" class="select select-bordered" required>
                <option value="admin">Admin</option>
                <option value="ptk">PTK</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection
