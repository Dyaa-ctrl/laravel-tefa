@extends('admin.layouts')
@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Detail Siswa</h1>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary mb-4">Kembali</a>

        <div class="card bg-base-100 shadow-lg p-6">
            <div class="flex justify-center mb-6">
                <img src="{{ asset('storage/public/siswas/' . $siswa->image) }}" alt="Foto Siswa" class="rounded-full w-32 h-32 border">
            </div>

            <table class="table w-full border">
                <thead>
                    <tr class="bg-gray-100">
                        <th colspan="2" class="text-center text-lg">Akun Siswa</th>
                        <th colspan="2" class="text-center text-lg">Data Siswa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="px-4 py-2">Nama</th>
                        <td class="px-4 py-2">: {{ $siswa->name }}</td>
                        <th class="px-4 py-2">Nis</th>
                        <td class="px-4 py-2">: {{ $siswa->nis }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2">Email</th>
                        <td class="px-4 py-2">: {{ $siswa->email }}</td>
                        <th class="px-4 py-2">Kelas</th>
                        <td class="px-4 py-2">: {{ $siswa->tingkatan }} {{ $siswa->jurusan }} {{ $siswa->kelas }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2"></td>
                        <td class="px-4 py-2"></td>
                        <th class="px-4 py-2">No Hp</th>
                        <td class="px-4 py-2">: {{ $siswa->hp }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2"></td>
                        <td class="px-4 py-2"></td>
                        <th class="px-4 py-2">Status</th>
                        <td class="px-4 py-2">: {{ $siswa->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
