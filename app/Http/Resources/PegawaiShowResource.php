<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PegawaiShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nik' => $this->nik,
            'nama_karyawan' => $this->nama_karyawan,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'agama' => $this->agama,
            'status_nikah' => $this->status_nikah,
            'alamat' => $this->alamat,
            'no_telp' => $this->no_telp,
            'pendidikan' => $this->pendidikan,
            'profil' => $this->profil != null ? asset($this->profil) : null,
            'tgl_diangkat' => $this->tgl_diangkat,
            'id_jabatan' => $this->id_jabatan,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
            'jabatan' => $this->jabatan,
            'gaji_pokok' => $this->gaji_pokok,
        ];
    }
}
