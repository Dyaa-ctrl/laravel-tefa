@extends ('auth.layouts')
@section('content')
<div class=" h-screen flex justify-center items-center">
    <div class="card w-80 bg-white rounded-lg shadow-lg p-8">

        <h1 class="text-4xl text-center font-extrabold mb-6">Login</h1>

        <!-- Error Message -->
        <div class="mb-4">
            @if ($errors->any())
                <div class="bg-red-100 text-red-600 p-4 rounded-md text-center">
                    <p>{{ $errors->first('email') ? $errors->first('email') : $errors->first('password') }}</p>
                </div>
            @endif
        </div>

        <!-- Login Form -->
        <form action="{{ route('authenticate') }}" method="post">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-lg font-bold text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Masukkan Email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                    required>
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-lg font-bold text-gray-700">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan Password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                    required>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center mb-4">
                <button type="submit"
                    class="w-full py-2 px-4 bg-slate-700 text-white font-bold rounded-md hover:bg-slate-800 focus:outline-none">
                    Login
                </button>
            </div>

            <!-- Register Link -->
            {{-- <div class="text-center">
                <p class="text-sm">Belum punya akun? <a href="{{ route('register') }}"
                        class="text-slate-700 font-semibold hover:text-slate-900">Daftar</a></p>
            </div> --}}
        </form>
    </div>
</div>
@endsection
