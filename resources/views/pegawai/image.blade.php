@extends('layout.main')

@section('konten')
    {{-- KRAJEE FILE INPUT PLUGIN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
        crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.4/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.4/js/plugins/buffer.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.4/js/plugins/filetype.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.4/js/plugins/piexif.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.4/js/plugins/sortable.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.4/js/fileinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.4/js/locales/LANG.js"></script>
    {{-- KRAJEE FILE INPUT PLUGIN --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            <button type="button" class="btn btn-secondary" onclick="return window.location.reload();">
                                <i class="fas fa-sync-alt"></i> Refresh
                            </button>
                        </h5>
                        <div class="card-tools">
                            <a href="{{ url('pegawai') }}" class="btn btn-secondary">
                                <i class="fas fa-chevron-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="profil">Atur Foto Profil</label>
                                            <input id="profil" class="input-file" name="file-profil" type="file"
                                                data-pegawai-id="{{ $pegawai->id }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <a href="{{ $pegawai->profil == null || $pegawai->profil == ''
                                                ? asset('template/empty-img.png')
                                                : asset($pegawai->profil) }}"
                                                target="_blank">
                                                <img class="profile-user-img img-fluid img-circle"
                                                    src="{{ $pegawai->profil == null || $pegawai->profil == ''
                                                        ? asset('template/empty-img.png')
                                                        : asset($pegawai->profil) }}"
                                                    alt="User profile picture"
                                                    style="width: 120px; height: 120px; object-fit: contain">
                                            </a>
                                        </div>

                                        <h3 class="profile-username text-center">{{ $pegawai->nama_karyawan }}</h3>

                                        <p class="text-muted text-center">{{ $pegawai->jabatan }}</p>
                                        <p class="text-muted text-center">Tanggal Diangkat {{ $pegawai->tgl_diangkat }}</p>

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>NIK</b> <a class="float-right">{{ $pegawai->nik }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Tempat Lahir</b> <a class="float-right">{{ $pegawai->tempat_lahir }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Tanggal Lahir</b> <a class="float-right">{{ $pegawai->tgl_lahir }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Agama</b> <a class="float-right">{{ $pegawai->agama }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Status Nikah</b> <a
                                                    class="float-right">{{ Str::ucfirst($pegawai->status_nikah) }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Alamat</b> <a class="float-right">{{ $pegawai->alamat }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>No. Telp</b> <a class="float-right">{{ $pegawai->no_telp }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Pendidikan</b> <a class="float-right">{{ $pegawai->pendidikan }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Gaji (Rp)</b> <a
                                                    class="float-right">{{ number_format($pegawai->gaji_pokok, 0, ',', '.') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var pegawaiId = $("#profil").data('pegawai-id');
            $(".input-file").fileinput({
                uploadUrl: "{{ url('api/pegawai/upload_image') }}" + '/' +
                    pegawaiId, // Sesuaikan dengan rute Laravel Anda
                previewFileType: 'any',
                uploadAsync: true,
                maxFileCount: 1,
                allowedFileExtensions: ['png', 'jpg', 'jpeg', 'webp']
            }).on('fileuploaded', function(event, data, previewId, index) {
                // alert('File upload berhasil! Path: ' + data.response.path);
                Swal.fire({
                    title: "Sukses!",
                    text: data.response.message,
                    icon: "success"
                }).then(() => window.location.reload());
            }).on('fileuploaderror', function(event, data, msg) {
                // alert('File upload gagal: ' + msg);
                console.log("File upload gagal: ".msg);
            });
        });
    </script>
@endsection
