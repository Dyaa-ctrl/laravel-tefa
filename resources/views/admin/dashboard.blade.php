<!-- @extends('admin.layouts') -->
@section('content')
    @if($message = Session::get('success'))
    <p>{{$message}}</p>
    @else
    <h1>Dashboard</h1>
    <p class="text-2xl text-center font-bold">Kamu Telah Login</p>
    @endif
@endsection
 
