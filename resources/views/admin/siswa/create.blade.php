@extends('admin.layouts')
@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Tambah Siswa</h1>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary mb-4">Kembali</a>

        @if($errors->any())
        <div class="alert alert-error shadow-lg mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Akun Siswa -->
            <div class="card bg-base-100 shadow-lg p-4">
                <h2 class="text-lg font-bold mb-2">Akun Siswa</h2>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Nama Lengkap</span>
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Nama Lengkap" class="input input-bordered">
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Email Address</span>
                    </label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email" class="input input-bordered">
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" name="password" id="password" placeholder="Password" class="input input-bordered">
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Confirm Password</span>
                    </label>
                    <input type="text" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password" class="input input-bordered">
                </div>
            </div>

            <!-- Data Siswa -->
            <div class="card bg-base-100 shadow-lg p-4">
                <h2 class="text-lg font-bold mb-2">Data Siswa</h2>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Foto Siswa</span>
                    </label>
                    <input type="file" name="image" accept="image/*" required class="file-input file-input-bordered">
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Nis Siswa</span>
                    </label>
                    <input type="text" name="nis" value="{{ old('nis') }}" placeholder="NIS" class="input input-bordered" required>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Tingkatan</span>
                    </label>
                    <select name="tingkatan" required class="select select-bordered">
                        <option value="">Pilih Tingkatan</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Jurusan</span>
                    </label>
                    <select name="jurusan" required class="select select-bordered">
                        <option value="">Pilih Jurusan</option>
                        <option value="TBSM">TBSM</option>
                        <option value="TJKT">TJKT</option>
                        <option value="PPLG">PPLG</option>
                        <option value="DKV">DKV</option>
                        <option value="TOI">TOI</option>
                    </select>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Kelas</span>
                    </label>
                    <select name="kelas" required class="select select-bordered">
                        <option value="">Pilih Kelas</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">No Hp</span>
                    </label>
                    <input type="text" name="hp" value="{{ old('hp') }}" placeholder="No HP" class="input input-bordered" required>
                </div>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <button type="reset" class="btn btn-secondary">Reset Data</button>
            </div>
        </form>
    </div>
@endsection
