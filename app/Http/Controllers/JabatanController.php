<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        return view('jabatan.index', [
            'title' => "Daftar Jabatan",
            'menu' => "jabatan",
            'data' => Jabatan::all(),
        ]);
    }
}
