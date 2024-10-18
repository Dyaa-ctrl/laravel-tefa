<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller 
{
    public function index(): View
    {
        $siswa = DB::table('siswas')
        ->join('users','siswas.id_user','=','users.id')
        ->select(
            'siswa.*',
            'user.name',
            'user.email'
        )
        ->paginate(10);
        return view('admin.siswa.index', compact('siswa'));
    }

    public function create():View
    {
    return view('admin.siswa.create');
    }
}