@extends('core/main')
@extends('core/footer')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', '')

@section('css')
    <!--===============================================================================================-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ url('assets/admin/css/app.css') }}">
    <link href="{{ asset('/vendors/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!--===============================================================================================-->
@endsection

@section('konten')

    <div>
        <div class="row mb-3">
            <div class="col-12 col-md-6">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Karyawan asdasd</h3>
                                <div class="card-title card-right d-flex align-items-center">
                                    {{ $total_karyawan }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Cuti</h3>
                                <div class="card-title card-right d-flex align-items-center">
                                    {{ $total_cuti }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Karyawan</h4>
                        <div class="d-flex ">
                        </div>
                    </div>
                    <div class="card-body px-3 pb-3">
                        <div class="table-responsive">
                            <table id='tabel_karyawan' width='100%' border="1" class='table table-striped'
                                style='border-collapse: collapse;'>
                                <thead>
                                    <tr>
                                        <th scope="col">Nomor Induk</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">Tanggal Bergabung</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Cuti</h4>
                        <div class="d-flex ">
                        </div>
                    </div>
                    <div class="card-body px-3 pb-3">
                        <div class="table-responsive">
                            <table id='tabel_cuti' width='100%' border="1" class='table table-striped'
                                style='border-collapse: collapse;'>
                                <thead>
                                    <tr>
                                        <th scope="col">Nomer Induk</th>
                                        <th scope="col">Tanggal Cuti</th>
                                        <th scope="col">Lama Cuti</th>
                                        <th scope="col">Keterangan Cuti</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card ">
                    <div class="card-header">
                        <h4>3 Karyawan Pertama Kali Gabung</h4>
                    </div>
                    <div class="card-body  px-3 pb-3">
                        <table id='tabel_pegawai_awal' width='100%' border="1" class='table table-striped'
                            style='border-collapse: collapse;'>
                            <thead>
                                <tr>
                                    <th scope="col">Nomor Induk</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Tanggal Bergabung</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="card ">
                        <div class="card-header">
                            <h4>Karyawan ambil cuti</h4>
                        </div>
                        <div class="card-body  px-3 pb-3">
                            <table id='tabel_pegawai_ambil_cuti' width='100%' border="1" class='table table-striped'
                                style='border-collapse: collapse;'>
                                <thead>
                                    <tr>
                                        <th scope="col">Nomor Induk</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">tanggal cuti</th>
                                        <th scope="col">keterangan</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="card ">
                        <div class="card-header">
                            <h4>Karyawan ambil cuti lebih dari satu hari</h4>
                        </div>
                        <div class="card-body  px-3 pb-3">
                            <table id='tabel_pegawai_ambil_cuti_lebih' width='100%' border="1" class='table table-striped'
                                style='border-collapse: collapse;'>
                                <thead>
                                    <tr>
                                        <th scope="col">Nomor Induk</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">tanggal cuti</th>
                                        <th scope="col">keterangan</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal button Add --}}

        <div class="modal fade text-left" id="add_data_pegawai" tabindex="-1" role="dialog" aria-labelledby="modal_add"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_add">Tambah Pegawai</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            onClick="reset_form()">
                            <i data-feather="x"></i>
                        </button>
                    </div>

                    {{-- form --}}
                    <form>
                        <div class="modal-body">
                            <label>*nama: </label>
                            <div class="form-group">
                                <input type="text" placeholder="Nama pegawai" class="form-control" name="add_nama"
                                    required>
                            </div>

                            <label>*alamat: </label>
                            <div class="form-group">
                                <input type="text" placeholder="Alamat Pegawai" class="form-control" name="add_alamat"
                                    required>
                            </div>

                            <label>*Tanggal Lahir: </label>
                            <div class="form-group">
                                <input type="date" placeholder="Tanggal Lahir Pegawai" class="form-control"
                                    name="add_tgl_lahir" required>
                            </div>

                            <label>*Tanggal Bergabung: </label>
                            <div class="form-group">
                                <input type="date" placeholder="Tanggal Bergabung Pegawai" class="form-control"
                                    name="add_tgl_gabung" required>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-dismiss="modal"
                                onClick="reset_form()">
                                <i class="bx bx-x d-block d-sm-none" onClick="reset_form()"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                        </div>
                    </form>
                    {{-- form End --}}

                </div>
            </div>
        </div>

        <div class="modal fade text-left" id="add_data_cuti" tabindex="-1" role="dialog" aria-labelledby="modal_add"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_add">Tambah Cuti</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            onClick="reset_form()">
                            <i data-feather="x"></i>
                        </button>
                    </div>

                    {{-- form --}}
                    <form>
                        <div class="modal-body">
                            <label>nomer induk: </label>
                            <div class="form-group">
                                <input type="text" placeholder="nomer induk" class="form-control" name="add_no_induk_cuti"
                                    readonly>
                            </div>
                            <label>Tanggal Cuti: </label>
                            <div class="form-group">
                                <input type="date" placeholder="tanggal cuti" class="form-control" name="add_tgl_cuti"
                                    required>
                            </div>

                            <label>Lama Cuti: </label>
                            <div class="form-group">
                                <input type="number" min="1" placeholder="Lama cuti" class="form-control" name="add_lama_cuti"
                                    required>
                            </div>

                            <label>Keterangan Cuti: </label>
                            <div class="form-group">
                                <input type="text" placeholder="Keterangan cuti" class="form-control"
                                    name="add_keterangan_cuti" required>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-dismiss="modal"
                                onClick="reset_form()">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                        </div>
                    </form>
                    {{-- form End --}}

                </div>
            </div>
        </div>

        {{-- End Modal button Add --}}

        {{-- Modal button Edit --}}

        <div class="modal fade text-left" id="edit_data_pegawai" tabindex="-1" role="dialog" aria-labelledby="modal_add"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_add">Edit Pegawai</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            onClick="reset_form()">
                            <i data-feather="x"></i>
                        </button>
                    </div>

                    {{-- form --}}
                    <form>
                        <div class="modal-body">
                            <label>nomer induk: </label>
                            <div class="form-group">
                                <input type="text" placeholder="nomer induk pegawai" class="form-control"
                                    name="edit_no_induk" readonly>
                            </div>
                            <label>nama: </label>
                            <div class="form-group">
                                <input type="text" placeholder="Nama pegawai" class="form-control" name="edit_nama">
                            </div>

                            <label>*alamat: </label>
                            <div class="form-group">
                                <input type="text" placeholder="Alamat Pegawai" class="form-control" name="edit_alamat">
                            </div>

                            <label>*Tanggal Lahir: </label>
                            <div class="form-group">
                                <input type="date" placeholder="Tanggal Lahir Pegawai" class="form-control"
                                    name="edit_tgl_lahir">
                            </div>

                            <label>*Tanggal Bergabung: </label>
                            <div class="form-group">
                                <input type="date" placeholder="Tanggal Bergabung Pegawai" class="form-control"
                                    name="edit_tgl_gabung">
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-dismiss="modal"
                                onClick="reset_form()">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                        </div>
                    </form>
                    {{-- form End --}}

                </div>
            </div>
        </div>

        <div class="modal fade text-left" id="edit_data_cuti" tabindex="-1" role="dialog" aria-labelledby="modal_add"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_add">Edit Cuti</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            onClick="reset_form()">
                            <i data-feather="x"></i>
                        </button>
                    </div>

                    {{-- form --}}
                    <form>
                        <div class="modal-body">
                            <label>nomer induk: </label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="edit_id_cuti" hidden>
                                <input type="text" placeholder="nomer induk" class="form-control"
                                    name="edit_no_induk_cuti" readonly>
                            </div>
                            <label>Tanggal Cuti: </label>
                            <div class="form-group">
                                <input type="date" placeholder="tanggal cuti" class="form-control" name="edit_tgl_cuti" readonly>
                            </div>

                            <label>Lama Cuti: </label>
                            <div class="form-group">
                                <input type="number" placeholder="Lama cuti" class="form-control" name="edit_lama_cuti" readonly>
                            </div>

                            <label>Keterangan Cuti: </label>
                            <div class="form-group">
                                <input type="text" placeholder="Keterangan cuti" class="form-control"
                                    name="edit_keterangan_cuti">
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-dismiss="modal"
                                onClick="reset_form()">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                        </div>
                    </form>
                    {{-- form End --}}

                </div>
            </div>
        </div>

        {{-- End Modal button Edit --}}
    </div>

@endsection

@section('js_asset')
    <!-- Datatable -->
    <script src="{{ asset('/vendors/datatables/jquery.dataTables.min.js') }}"></script>

    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabel_karyawan').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('api/pegawai/list') }}",
                columns: [{
                        data: 'no_induk'
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'alamat'
                    },
                    {
                        data: 'tgl_lahir'
                    },
                    {
                        data: 'tgl_gabung'
                    },
                    {
                        sortable: false,
                        render: function(data, type, full, meta) {
                            const button_tambah_cuti =
                                "<a class=\"btn icon btn-success mx-1 my-1\" data-toggle=\"tooltip\" data-title=\"Tambah Cuti\" title=\"Tambah Cuti\" href=\"javascript:void(0)\" onclick=\"tambah_cuti('" +
                                full.no_induk + "')\">➕</a>";
                            const button_edit =
                                "<a class=\"btn icon btn-primary mx-1 my-1\" data-toggle=\"tooltip\" data-title=\"Edit\" title=\"Edit\" href=\"javascript:void(0)\" onclick=\"edit_pegawai('" +
                                full.id + "', '" + full.no_induk + "', '" + full.nama + "', '" +
                                full.alamat + "', '" + full.tgl_lahir + "', '" + full.tgl_gabung +
                                "')\">⚙</a>";
                            const button_delete =
                                "<a class=\"btn icon btn-danger mx-1 my-1\" data-toggle=\"tooltip\" data-title=\"Delete\" title=\"Delete\" href=\"javascript:void(0)\" onclick=\"remove('pegawai'," +
                                full.id + ")\">🚮</a>";
                            return button_tambah_cuti + button_edit + button_delete;
                        }
                    },
                ],
                order: [
                    [0, 'desc']
                ],
                dom: 'Bfrtip',
                lengthMenu: [
                    [5, 10, 50, 100],
                    ['5 rows', '10 rows', '50 rows', '100 rows']
                ],
                buttons: [{
                        text: 'Tambah Pegawai',
                        action: function(e, dt, node, config) {
                            $('#add_data_pegawai').modal('show');
                        }
                    },
                    'pageLength', 'copy', 'csv', 'excel', 'pdf', 'print',
                ],
            });
            $('#tabel_cuti').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('api/cuti/list') }}",
                columns: [{
                        data: 'no_induk'
                    },
                    {
                        data: 'tgl_cuti'
                    },
                    {
                        data: 'lama_cuti'
                    },
                    {
                        data: 'keterangan'
                    },
                    {
                        sortable: false,
                        render: function(data, type, full, meta) {
                            const button_edit =
                                "<a class=\"btn icon btn-primary mx-1 my-1\" data-toggle=\"tooltip\" data-title=\"Edit\" title=\"Edit\" href=\"javascript:void(0)\" onclick=\"edit_cuti('" +
                                full.id + "', '" + full.no_induk + "', '" + full.tgl_cuti + "', '" +
                                full.lama_cuti + "', '" + full.keterangan +
                                "')\">⚙</a>";
                            const button_delete =
                                "<a class=\"btn icon btn-danger mx-1 my-1\" data-toggle=\"tooltip\" data-title=\"Delete\" title=\"Delete\" href=\"javascript:void(0)\" onclick=\"remove('cuti'," +
                                full.id + ")\">🚮</a>";
                            return button_edit + button_delete;
                        }
                    },
                ],
                order: [
                    [1, 'desc']
                ],
                dom: 'Bfrtip',
                lengthMenu: [
                    [5, 10, 50, 100],
                    ['5 rows', '10 rows', '50 rows', '100 rows']
                ],
                buttons: [
                    'pageLength', 'copy', 'csv', 'excel', 'pdf', 'print'
                ],
            });

            $('#tabel_pegawai_awal').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('api/pegawai/list/3') }}",
                columns: [{
                        sortable: false,
                        data: 'no_induk'
                    },
                    {
                        sortable: false,
                        data: 'nama'
                    },
                    {
                        sortable: false,
                        data: 'alamat'
                    },
                    {
                        sortable: false,
                        data: 'tgl_lahir'
                    },
                    {
                        sortable: false,
                        data: 'tgl_gabung'
                    },
                ],
                order: [
                    [0, 'desc']
                ],
                dom: 'Brtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                ],
            });

            $('#tabel_pegawai_ambil_cuti').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('api/pegawai/cuti/list') }}",
                columns: [{
                        data: 'no_induk'
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'tgl_cuti'
                    },
                    {
                        data: 'keterangan'
                    },
                ],
                lengthMenu: [
                    [5],
                    ['5 rows']
                ],
                order: [
                    [0, 'desc']
                ],
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                ],
            });

            $('#tabel_pegawai_ambil_cuti_lebih').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('api/pegawai/cuti/list_lebih') }}",
                columns: [{
                        data: 'no_induk'
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'tgl_cuti'
                    },
                    {
                        data: 'keterangan'
                    },
                ],
                lengthMenu: [
                    [5],
                    ['5 rows']
                ],
                order: [
                    [0, 'desc']
                ],
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                ],
            });
        });
    </script>
@endsection

@section('js_script')
    {{-- @include('script/dashboard/chart') --}}
    @include('script/dashboard/ajax')
@endsection
