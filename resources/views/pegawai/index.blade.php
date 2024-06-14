@extends('layout.main')

@section('konten')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/template') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('/template') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('/template') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('/template') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/template') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('/template') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('/template') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('/template') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('/template') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-12 -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            <button type="button" class="btn btn-secondary" onclick="reload()">
                                <i class="fas fa-sync-alt"></i> Refresh
                            </button>
                        </h5>
                        <div class="card-tools">
                            <a href="{{ url('pegawai/create') }}" class="btn btn-secondary">
                                <i class="fa fa-plus"></i> Tambah
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="pegawai-table" class="table table-sm table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Jabatan</th>
                                    <th>Tanggal Diangkat</th>
                                    <th>Gaji (Rp)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    <script>
        function reload() {
            $("#pegawai-table").DataTable().ajax.reload();
        }

        function hapus(id) {
            Swal.fire({
                title: "Hapus Pegawai?",
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Hapus!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    const url = '{{ url('api/pegawai') }}' + '/' + id;
                    fetch(url, {
                            method: 'DELETE',
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for Laravel
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: "Sukses!",
                                    text: data.message,
                                    icon: "success"
                                });
                                reload();
                            } else {
                                Swal.fire({
                                    title: "Peringatan!",
                                    text: data.message,
                                    icon: "error"
                                });
                                reload();
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire({
                                title: "Peringatan!",
                                text: "Terjadi kesalahan saat menyimpan data!",
                                icon: "error"
                            });
                            reload();
                        });
                }
            });
        }

        $(document).ready(function() {
            $('#pegawai-table').DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('pegawai/datatable') }}",
                    error: function(xhr, error, code) {
                        console.log("AJAX error response:", xhr);
                        alert('Terjadi kesalahan saat memuat data: ' + xhr.responseJSON.message);
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    }, {
                        data: 'nama_karyawan',
                        name: 'nama_karyawan',
                    },
                    {
                        data: 'tgl_lahir',
                        name: 'tgl_lahir',
                    },
                    {
                        data: 'alamat',
                        name: 'alamat',
                    },
                    {
                        data: 'jabatan',
                        name: 'jabatan.jabatan',
                    },
                    {
                        data: 'tgl_diangkat',
                        name: 'tgl_diangkat',
                    },
                    {
                        data: 'gaji_pokok',
                        name: 'jabatan.gaji_pokok',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                    }
                ],
                order: [
                    [5, 'desc']
                ],
                initComplete: function() {
                    this.api().columns().every(function(index) {
                        let column = this;
                        let title = $(column.header()).text().trim();
                        let dataSrc = column.dataSrc();

                        // mengecek apakah kolom searchable?
                        if (!column.settings()[0].aoColumns[index].bSearchable) {
                            return;
                        }

                        let input;
                        if (dataSrc === 'tgl_lahir') {
                            input = $(
                                '<div class="input-group date" id="reservationdate-' +
                                index + '" data-target-input="nearest">' +
                                '<input type="text" class="form-control datetimepicker-input" data-target="#reservationdate-' +
                                index + '"/>' +
                                '<div class="input-group-append" data-target="#reservationdate-' +
                                index + '" data-toggle="datetimepicker">' +
                                '<div class="input-group-text"><i class="fa fa-calendar"></i></div>' +
                                '</div>' +
                                '</div>'
                            );
                            $(input).appendTo($(column.footer()).empty());

                            $('#reservationdate-' + index).datetimepicker({
                                format: 'L'
                            });

                            // $('#reservationdate' + index).daterangepicker({
                            //     timePicker: true,
                            //     timePickerIncrement: 30,
                            //     locale: {
                            //         format: 'MM/DD/YYYY'
                            //     }
                            // })

                            // Use .on('change.datetimepicker') to bind the change event
                            $('#reservationdate-' + index).on('change.datetimepicker', function(
                                event) {
                                if (event.date) {
                                    column.search(event.date.format('YYYY-MM-DD'))
                                        .draw();
                                } else {
                                    column.search("").draw();
                                }
                            });

                            // input = $(
                            //     '<div class="input-group">' +
                            //     '<div class="input-group-prepend">' +
                            //     '<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>' +
                            //     '</div>' +
                            //     '<input type="text" class="form-control float-right" id="reservation-' +
                            //     index + '">' +
                            //     '</div>'
                            // );
                            // $(input).appendTo($(column.footer()).empty());

                            // //Date range picker
                            // $('#reservation-' + index).daterangepicker({
                            //     autoUpdateInput: false,
                            //     showDropdowns: true,
                            //     locale: {
                            //         format: 'YYYY-MM-DD',
                            //         cancelLabel: 'Clear'
                            //     }
                            // });

                            // $('#reservation-' + index).on('apply.daterangepicker', function(ev,
                            //     picker) {
                            //     $(this).val(picker.startDate.format('YYYY-MM-DD') +
                            //         ' - ' + picker.endDate.format('YYYY-MM-DD'));
                            //     var startDate = picker.startDate.format('YYYY-MM-DD');
                            //     var endDate = picker.endDate.format('YYYY-MM-DD');
                            //     column.search(startDate + '|' + endDate).draw();
                            // });

                            // $('#reservation-' + index).on('cancel.daterangepicker', function(ev,
                            //     picker) {
                            //     $(this).val('');
                            //     column.search('').draw();
                            // });
                        } else {
                            input = $('<input class="form-control" placeholder="Pencarian ' +
                                title + '" />');
                            $(input).appendTo($(column.footer()).empty())
                                .on('keyup change clear', function() {
                                    if (column.search() !== this.value) {
                                        column.search(this.value).draw();
                                    }
                                });
                        }

                    });
                }
            });
        });
    </script>
@endsection
