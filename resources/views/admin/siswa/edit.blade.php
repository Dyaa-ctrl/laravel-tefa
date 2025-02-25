@extends('admin.layouts')
@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Siswa</h1>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary mb-4">Kembali</a>

        @if($errors->any())
        <div class="alert alert-danger mb-4">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('siswa.update', $siswa->id)}}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Foto Siswa</span>
                </label>
                <img src="{{ asset('storage/public/siswas/' . $siswa->image) }}" alt="Foto Siswa" class="w-32 h-32 rounded-full border mb-2">
                <input type="file" name="image" accept="image/*" class="file-input file-input-bordered file-input-primary">
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">NIS Siswa</span>
                </label>
                <input type="text" name="nis" id="nis" value="{{ old('nis', $siswa->nis) }}" class="input input-bordered w-full" required>
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Nama Lengkap</span>
                </label>
                <input type="text" name="name" id="name" value="{{ old('name', $siswa->name) }}" class="input input-bordered w-full" required>
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Tingkatan</span>
                </label>
                <select name="tingkatan" class="select select-bordered w-full">
                    <option {{ 'X' == $siswa->tingkatan ? 'selected' : '' }} value="X">X</option>
                    <option {{ 'XI' == $siswa->tingkatan ? 'selected' : '' }} value="XI">XI</option>
                    <option {{ 'XII' == $siswa->tingkatan ? 'selected' : '' }} value="XII">XII</option>
                </select>
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Jurusan</span>
                </label>
                <select name="jurusan" class="select select-bordered w-full">
                    <option {{ 'TBSM' == $siswa->jurusan ? 'selected' : '' }} value="TBSM">TBSM</option>
                    <option {{ 'TJKT' == $siswa->jurusan ? 'selected' : '' }} value="TJKT">TJKT</option>
                    <option {{ 'PPLG' == $siswa->jurusan ? 'selected' : '' }} value="PPLG">PPLG</option>
                    <option {{ 'DKV' == $siswa->jurusan ? 'selected' : '' }} value="DKV">DKV</option>
                    <option {{ 'TOI' == $siswa->jurusan ? 'selected' : '' }} value="TOI">TOI</option>
                </select>
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Kelas</span>
                </label>
                <select name="kelas" class="select select-bordered w-full">
                    <option {{ '1' == $siswa->kelas ? 'selected' : '' }} value="1">1</option>
                    <option {{ '2' == $siswa->kelas ? 'selected' : '' }} value="2">2</option>
                    <option {{ '3' == $siswa->kelas ? 'selected' : '' }} value="3">3</option>
                    <option {{ '4' == $siswa->kelas ? 'selected' : '' }} value="4">4</option>
                </select>
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">No HP</span>
                </label>
                <input type="text" name="hp" value="{{ old('hp', $siswa->hp) }}" class="input input-bordered w-full" required>
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Status</span>
                </label>
                <select name="status" class="select select-bordered w-full">
                    <option {{ '1' == $siswa->status ? 'selected' : '' }} value="1">Aktif</option>
                    <option {{ '0' == $siswa->status ? 'selected' : '' }} value="0">Tidak Aktif</option>
                </select>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="btn btn-primary">SIMPAN DATA</button>
                <button type="reset" class="btn btn-secondary">RESET DATA</button>
            </div>
        </form>
    </div>
@endsection
