<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PegawaiResource;
use App\Http\Resources\PegawaiShowResource;
use App\Models\Pegawai;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $perPage = $request->query('per_page', 10);

            if (!is_numeric($perPage) || $perPage <= 0) {
                return response()->json([
                    'success' => false,
                    'error' => 'Bad Request',
                    'message' => 'Parameter per_page harus berupa angka positif.',
                ], 400);
            }

            $pegawai = Pegawai::join('jabatan', 'pegawai.id_jabatan', '=', 'jabatan.id')
                ->select([
                    'pegawai.*',
                    'jabatan.jabatan as jabatan',
                    'jabatan.gaji_pokok as gaji_pokok'
                ])->paginate($perPage);
            return PegawaiResource::collection($pegawai);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Internal Server Error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Aturan validasi yang sesuai dengan aturan yang telah Anda tetapkan
            $validator = Validator::make($request->all(), [
                'nik' => 'required|max:16',
                'nama_karyawan' => 'required|max:150',
                'tempat_lahir' => 'required|max:150',
                'agama' => 'required',
                'status_nikah' => 'required',
                'pendidikan' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required|max:15',
                'tgl_diangkat' => 'required|date_format:Y-m-d',
                'tgl_lahir' => 'required|date_format:Y-m-d',
                'id_jabatan' => 'required',
            ], [
                'nik.required' => 'NIK tidak boleh kosong',
                'nik.max' => 'NIK maksimal 16 karakter',
                'nama_karyawan.required' => 'Nama tidak boleh kosong',
                'nama_karyawan.max' => 'Nama maksimal 150 karakter',
                'tempat_lahir.required' => 'Tempat lahir tidak boleh kosong',
                'tempat_lahir.max' => 'Tempat Lahir maksimal 150 karakter',
                'tgl_lahir.required' => 'Tanggal lahir harus diisi',
                'tgl_lahir.date_format' => 'Tanggal harus dalam format yyyy-mm-dd',
                'agama.required' => 'Agama tidak boleh kosong',
                'status_nikah.required' => 'Status nikah tidak boleh kosong',
                'pendidikan.required' => 'Pendidikan tidak boleh kosong',
                'alamat.required' => 'Alamat tidak boleh kosong',
                'no_telp.required' => 'Nomor telepon harus diisi',
                'no_telp.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter',
                'tgl_diangkat.required' => 'Tanggal diangkat harus diisi',
                'tgl_diangkat.date_format' => 'Tanggal harus dalam format yyyy-mm-dd',
                'id_jabatan.required' => 'Jabatan tidak boleh kosong',
            ]);

            // Jika validasi gagal, kembalikan respons dengan pesan error
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal! Periksa kembali data anda.',
                    'errors' => $validator->errors()->toArray(),
                ], 400);
            }

            $save = Pegawai::create($request->all());
            if ($save) {
                return response()->json([
                    'success' => true,
                    'message' => "Data pegawai dengan nama " . $request->nama_karyawan . " berhasil ditambahkan.",
                    'data' => $save,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'error' => 'Internal Server Error',
                    'message' => 'Terjadi kesalahan saat menambahkan data!',
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Internal Server Error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $pegawai = Pegawai::join('jabatan', 'pegawai.id_jabatan', '=', 'jabatan.id')
                ->select([
                    'pegawai.*',
                    'jabatan.jabatan as jabatan',
                    'jabatan.gaji_pokok as gaji_pokok'
                ])->where('pegawai.id', $id)->firstOrFail();

            return response()->json([
                'success' => true,
                'data' => new PegawaiShowResource($pegawai),
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Pegawai tidak ditemukan!',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Internal Server Error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $pegawai = Pegawai::findOrFail($id);
            // Aturan validasi yang sesuai dengan aturan yang telah Anda tetapkan
            $validator = Validator::make($request->all(), [
                'nik' => 'required|max:16',
                'nama_karyawan' => 'required|max:150',
                'tempat_lahir' => 'required|max:150',
                'agama' => 'required',
                'status_nikah' => 'required',
                'pendidikan' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required|max:15',
                'tgl_diangkat' => 'required|date_format:Y-m-d',
                'tgl_lahir' => 'required|date_format:Y-m-d',
                'id_jabatan' => 'required',
            ], [
                'nik.required' => 'NIK tidak boleh kosong',
                'nik.max' => 'NIK maksimal 16 karakter',
                'nama_karyawan.required' => 'Nama tidak boleh kosong',
                'nama_karyawan.max' => 'Nama maksimal 150 karakter',
                'tempat_lahir.required' => 'Tempat lahir tidak boleh kosong',
                'tempat_lahir.max' => 'Tempat Lahir maksimal 150 karakter',
                'tgl_lahir.required' => 'Tanggal lahir harus diisi',
                'tgl_lahir.date_format' => 'Tanggal harus dalam format yyyy-mm-dd',
                'agama.required' => 'Agama tidak boleh kosong',
                'status_nikah.required' => 'Status nikah tidak boleh kosong',
                'pendidikan.required' => 'Pendidikan tidak boleh kosong',
                'alamat.required' => 'Alamat tidak boleh kosong',
                'no_telp.required' => 'Nomor telepon harus diisi',
                'no_telp.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter',
                'tgl_diangkat.required' => 'Tanggal diangkat harus diisi',
                'tgl_diangkat.date_format' => 'Tanggal harus dalam format yyyy-mm-dd',
                'id_jabatan.required' => 'Jabatan tidak boleh kosong',
            ]);

            // Jika validasi gagal, kembalikan respons dengan pesan error
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal! Periksa kembali data anda.',
                    'errors' => $validator->errors()->toArray(),
                ], 400);
            }

            $save = $pegawai->update($request->all());
            if ($save) {
                return response()->json([
                    'success' => true,
                    'message' => "Data pegawai dengan berhasil diubah.",
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'error' => 'Internal Server Error',
                    'message' => 'Terjadi kesalahan saat menambahkan data!',
                ], 500);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Pegawai tidak ditemukan!',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Internal Server Error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $pegawai = Pegawai::findOrFail($id);

            if ($pegawai->profil) {
                $oldPath = public_path(parse_url($pegawai->profil, PHP_URL_PATH));
                if ($pegawai->profil != null && $pegawai->profil != "" && file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $pegawai->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data pegawai berhasil dihapus'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Pegawai tidak ditemukan!',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Internal Server Error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function upload_image(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'file-profil' => 'required|mimes:jpg,jpeg,png,webp|max:5120', // max 5MB
        ], [
            'file-profil.required' => 'File gambar harus diunggah.',
            'file-profil.mimes' => 'Format gambar harus berupa: jpg, jpeg, png, webp.',
            'file-profil.max' => 'Ukuran gambar maksimal adalah 5MB.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal! Periksa kembali data anda.',
                'error' => $validator->errors()->first()
            ], 400);
        }

        if ($request->file('file-profil')->isValid()) {
            if (!$pegawai) {
                return response()->json(['error' => 'Pegawai tidak ditemukan!'], 404);
            }

            // Hapus file lama jika ada
            if ($pegawai->profil) {
                $oldPath = public_path(parse_url($pegawai->profil, PHP_URL_PATH));
                if ($pegawai->profil != null && $pegawai->profil != "" && file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            // $path = $request->file('file-profil')->store("uploads/pegawai_$id", 'public');
            $nameImage = time() . '.' . $request->file('file-profil')->extension();
            $request->file('file-profil')->move(public_path('uploads/images'), $nameImage);
            $path = url('uploads/images/' . $nameImage);

            $pegawai->update([
                'profil' => $path,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'File uploaded successfully!',
                'path' => $path,
            ], 200);
        }

        return response()->json([
            'success' => false,
            'error' => 'Internal Server Error',
            'message' => 'Terjadi kesalahan pada sistem!',
        ], 500);
    }
}
