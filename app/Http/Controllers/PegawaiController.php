<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use Exception;
use Yajra\DataTables\Facades\DataTables;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pegawai.index', [
            'title' => "Daftar Pegawai",
            'menu' => "pegawai",
        ]);
    }

    public function datatable()
    {
        try {
            $pegawai = Pegawai::join('jabatan', 'pegawai.id_jabatan', '=', 'jabatan.id')
                ->select([
                    'pegawai.id',
                    'pegawai.nama_karyawan',
                    'pegawai.tgl_lahir',
                    'pegawai.tgl_diangkat',
                    'pegawai.alamat',
                    'jabatan.jabatan as jabatan',
                    'jabatan.gaji_pokok as gaji_pokok'
                ]);

            return Datatables::of($pegawai)
                ->addIndexColumn()
                ->addColumn('gaji_pokok', function ($row) {
                    return "<div class='text-right'>" . number_format($row->gaji_pokok, 0, ",", ".") . "</div>";
                })
                ->addColumn('action', function ($row) {
                    $btn = '
                    <div class="btn-group d-flex justify-center align-items-center" role="group">
                        <a href="' . asset('pegawai/' . $row->id . '/edit') . '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                        <button type="button" onclick="hapus(' . $row->id . ')" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
                        <a href="' . asset('pegawai/' . $row->id) . '" class="btn btn-sm btn-info"><i class="fa fa-images"></i></a>
                    </div>
                    ';
                    return $btn;
                })
                ->rawColumns(['action', 'gaji_pokok'])
                ->make(true);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.create', [
            'title' => "Tambah Pegawai",
            'menu' => "pegawai",
            'jabatan' => Jabatan::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', [
            'title' => "Edit Pegawai",
            'menu' => "pegawai",
            'jabatan' => Jabatan::all(),
            'pegawai' => $pegawai,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pegawai = Pegawai::join('jabatan', 'pegawai.id_jabatan', '=', 'jabatan.id')
            ->select([
                'pegawai.*',
                'jabatan.jabatan as jabatan',
                'jabatan.gaji_pokok as gaji_pokok'
            ])->where('pegawai.id', $id)->firstOrFail();

        return view('pegawai.image', [
            'title' => "Profil Pegawai",
            'menu' => "pegawai",
            'jabatan' => Jabatan::all(),
            'pegawai' => $pegawai,
        ]);
    }
}
