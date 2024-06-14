@extends('layout.main')

@section('konten')
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
                        <form id="form-save">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="number" class="form-control" id="nik" name="nik" />
                            </div>
                            <div class="form-group">
                                <label for="nama_karyawan">Nama Karyawan</label>
                                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" />
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <textarea class="form-control" id="tempat_lahir" name="tempat_lahir"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <div class="input-group date tgl_lahir" id="tgl_lahir" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#tgl_lahir">
                                    <div class="input-group-append" data-target="#tgl_lahir" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select name="agama" id="agama" class="form-control select2bs4">
                                    <option value="">-- Pilih --</option>
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="hindhu">Hindhu</option>
                                    <option value="budha">Budha</option>
                                    <option value="konghuchu">Konghuchu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status_nikah">Status Nikah</label>
                                <select name="status_nikah" id="status_nikah" class="form-control select2bs4">
                                    <option value="">-- Pilih --</option>
                                    <option value="belum kawin">Belum Kawin</option>
                                    <option value="kawin">Kawin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No. Telp</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" />
                            </div>
                            <div class="form-group">
                                <label for="pendidikan">Pendidikan</label>
                                <select name="pendidikan" id="pendidikan" class="form-control select2bs4">
                                    <option value="">-- Pilih --</option>
                                    <option value="SMA/SMK/Sederajat">SMA/SMK/Sederajat</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_jabatan">Jabatan</label>
                                <select name="id_jabatan" id="id_jabatan" class="form-control select2bs4">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($jabatan as $j)
                                        <option value="{{ $j->id }}">{{ $j->jabatan }} - Rp.
                                            {{ number_format($j->gaji_pokok, 0, ',', '.') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl_diangkat">Tanggal Diangkat</label>
                                <div class="input-group date" id="tgl_diangkat" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#tgl_diangkat">
                                    <div class="input-group-append" data-target="#tgl_diangkat"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-primary btn-block btnSimpan">
                                    <i class="fa fa-save"></i>
                                    Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function setLoadingState() {
            $(".btnSimpan").attr('disabled', true).html(`<i class="fa fa-spin fa-spinner"></i>`);
        }

        function resetButtonState() {
            $(".btnSimpan").removeAttr('disabled').html(`<i class="fa fa-save"></i> Simpan`);
        }


        $(document).ready(function() {
            $('#tgl_diangkat').datetimepicker({
                format: 'L'
            });

            $('#tgl_lahir').datetimepicker({
                format: 'L'
            });

            $.validator.setDefaults({
                submitHandler: function() {
                    alert("Form successful submitted!");
                }
            });

            $.validator.addMethod("dateFormat", function(value, element) {
                return this.optional(element) || /^\d{4}-\d{2}-\d{2}$/.test(value);
            }, "Masukkan tanggal dengan format yyyy-mm-dd.");

            $.validator.addMethod("indonesianPhone", function(value, element) {
                    return this.optional(element) || /^62\d{9,13}$/.test(value);
                },
                "Masukkan nomor telepon Indonesia yang valid yang dimulai dengan 62 dan memiliki panjang antara 10 hingga 15 digit."
            );

            $('#form-save').validate({
                rules: {
                    nik: {
                        required: true,
                        maxlength: 16,
                    },
                    nama_karyawan: {
                        required: true,
                        maxlength: 150,
                    },
                    tempat_lahir: {
                        required: true,
                        maxlength: 150,
                    },
                    agama: {
                        required: true
                    },
                    status_nikah: {
                        required: true
                    },
                    pendidikan: {
                        required: true
                    },
                    alamat: {
                        required: true
                    },
                    no_telp: {
                        required: true,
                        indonesianPhone: true,
                        maxlength: 15
                    },
                    tgl_diangkat: {
                        required: true,
                        dateFormat: true
                    },
                    tgl_lahir: {
                        required: true,
                        dateFormat: true
                    },
                    id_jabatan: {
                        required: true,
                    },
                },
                messages: {
                    nik: {
                        required: "NIK tidak boleh kosong",
                        maxlength: "NIK maksimal 16 karakter",
                    },
                    nama_karyawan: {
                        required: "Nama tidak boleh kosong",
                        maxlength: "Nama maksimal 150 karakter",
                    },
                    tempat_lahir: {
                        required: "Tempat lahir tidak boleh kosong",
                        maxlength: "Tempat Lahir maksimal 150 karakter",
                    },
                    tgl_lahir: {
                        required: "Tanggal lahir harus diisi",
                        dateFormat: "Tanggal harus dalam format yyyy-mm-dd"
                    },
                    agama: {
                        required: "Agama tidak boleh kosong",
                    },
                    status_nikah: {
                        required: "Status nikah tidak boleh kosong",
                    },
                    pendidikan: {
                        required: "Pendidikan nikah tidak boleh kosong",
                    },
                    alamat: {
                        required: "Alamat nikah tidak boleh kosong",
                    },
                    id_jabatan: {
                        required: "Jabatan tidak boleh kosong",
                    },
                    no_telp: {
                        required: "Nomor telepon harus diisi",
                        indonesianPhone: "Nomor telepon harus dimulai dengan 62 dan memiliki panjang antara 10 hingga 15 digit",
                        maxlength: "Nomor telepon tidak boleh lebih dari 15 karakter"
                    },
                    tgl_diangkat: {
                        required: "Tanggal diangkat harus diisi",
                        dateFormat: "Tanggal harus dalam format yyyy-mm-dd"
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form, event) {
                    event.preventDefault();

                    let formData = new FormData(form);
                    let formObj = {};
                    formData.forEach((value, key) => {
                        formObj[key] = value;
                    });
                    // Sekarang, tambahkan nilai dari datetimepicker ke dalam objek formObj
                    let nilaiTglDiangkat = $('#tgl_diangkat').datetimepicker('date');
                    let nilaiTglLahir = $('#tgl_lahir').datetimepicker('date');
                    formObj['tgl_diangkat'] = nilaiTglDiangkat ? nilaiTglDiangkat.format('YYYY-MM-DD') :
                        null;
                    formObj['tgl_lahir'] = nilaiTglLahir ? nilaiTglLahir.format('YYYY-MM-DD') : null;

                    setLoadingState();
                    const url = "{{ url('/api/pegawai') }}";
                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for Laravel
                            },
                            body: JSON.stringify(formObj)
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: "Sukses!",
                                    text: data.message,
                                    icon: "success"
                                }).then(() => window.location.href = "{{ url('pegawai') }}");
                            } else {
                                Swal.fire({
                                    title: "Peringatan!",
                                    text: data.message,
                                    icon: "error"
                                });
                            }

                            if (data.errors) {
                                var errors = data.errors;
                                // console.log(errors);
                                // Iterasi setiap error dan tambahkan pesan ke form HTML
                                $.each(errors, function(field, messages) {
                                    if (field == 'tgl_diangkat' || field == 'tgl_lahir') {
                                        var input = $('[name="' + field + '"]');
                                        var errorElement = input.closest('.input-group')
                                            .find('.invalid-feedback');
                                        errorElement.empty();
                                        $.each(messages, function(index, message) {
                                            errorElement.append('<p>' + message +
                                                '</p>');
                                        });
                                        input.addClass('is-invalid');
                                    } else {
                                        var input = $('[name="' + field + '"]');
                                        var errorElement = $(
                                                '<div class="invalid-feedback"></div>')
                                            .appendTo(input.closest('.form-group'));

                                        // Hapus pesan kesalahan sebelumnya jika ada
                                        errorElement.empty();

                                        $.each(messages, function(index, message) {
                                            errorElement.append('<p>' + message +
                                                '</p>');
                                        });

                                        input.addClass('is-invalid');
                                    }
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire({
                                title: "Peringatan!",
                                text: "Terjadi kesalahan saat menyimpan data!",
                                icon: "error"
                            });
                        }).finally(() => {
                            resetButtonState();
                        });
                    return false;
                }
            });
        });
    </script>
@endsection
