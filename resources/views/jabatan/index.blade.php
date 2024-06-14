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
                    </div>
                    <div class="card-body">
                        <table id="jabatan-table" class="table table-sm table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jabatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $jabatan)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $jabatan->jabatan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
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
            window.location.reload();
        }

        $(function() {
            $('#jabatan-table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
