<script>
    /* Send Form */
    $("form").on("submit", function(e) {
        e.preventDefault();
        var valid = true;
        var token = $('meta[name="csrf-token"]').attr('content');
        var tabel = '';
        //generalisasi form agar data file bisa masuk
        var form = $(this)[0];

        if (
            typeof $('input[name="add_nama"]').val() !== 'undefined' &&
            $('input[name="add_nama"]').val() !== null &&
            $('input[name="add_nama"]').val() !== ''
        ) {
            var url = "{{ url('/api/pegawai/add') }}";
            var status = 'Penambahan';
        } else if (
            typeof $('input[name="edit_nama"]').val() !== 'undefined' &&
            $('input[name="edit_nama"]').val() !== null &&
            $('input[name="edit_nama"]').val() !== ''
        ) {
            var url = "{{ url('/api/pegawai/edit') }}";
            var status = 'Pengubahan';
        } else if (
            typeof $('input[name="add_no_induk_cuti"]').val() !== 'undefined' &&
            $('input[name="add_no_induk_cuti"]').val() !== null &&
            $('input[name="add_no_induk_cuti"]').val() !== ''
        ) {
            var url = "{{ url('/api/cuti/add') }}";
            var status = 'Penambahan';

        } else if (
            typeof $('input[name="edit_no_induk_cuti"]').val() !== 'undefined' &&
            $('input[name="edit_no_induk_cuti"]').val() !== null &&
            $('input[name="edit_no_induk_cuti"]').val() !== ''
        ) {
            var url = "{{ url('/api/cuti/edit') }}";
            var status = 'Pengubahan';

        }
        //mengambil semua data di dalam form
        var formData = new FormData(form);
        //fitur swal
        $(this).find('.textbox').each(function() {
            if (!$(this).val()) {
                get_error_text(this);
                valid = false;
                $('html,body').animate({
                    scrollTop: 0
                }, "slow");
            }
            if ($(this).hasClass('no-valid')) {
                valid = false;
                $('html,body').animate({
                    scrollTop: 0
                }, "slow");
            }
        });
        if (valid) {
            Swal.fire({
                title: 'Konfirmasi simpan data',
                text: "Data akan di simpan ke database",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: "#1da1f2",
                confirmButtonText: "Yakin, dong!",
                cancelButtonColor: '#d33',
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        url: url,
                        type: "POST",
                        data: formData,
                        dataType: "html",
                        contentType: false,
                        processData: false,
                        //jika ajax sukses
                        success: function(data) {
                            if (data.includes("Jatah cuti")) {
                                setTimeout(function() {
                                    swal.fire("Error", data,
                                        "error");
                                }, 2000);
                            } else {
                                swal.fire({
                                    title: status + " data berhasil",
                                    icon: "success"
                                }).then((result) => {
                                    if (result.value) {
                                        $('form').trigger("reset");
                                        $('#tabel_karyawan').DataTable().ajax
                                            .reload();
                                        $('#tabel_cuti').DataTable().ajax.reload();
                                        $('#tabel_pegawai_ambil_cuti').DataTable()
                                            .ajax
                                            .reload();
                                    }
                                });
                            }
                        },
                        //jika ajax gagal
                        error: function(xhr, ajaxOptions, thrownError) {
                            setTimeout(function() {
                                swal.fire("Error", "Periksa koneksi anda", "error");
                            }, 2000);
                        }
                    });
                }
            })
        }
    });
    /* Send Form End */

    function remove(tabel, id) {
        var valid = true;
        var token = $('meta[name="csrf-token"]').attr('content');

        if (tabel == 'pegawai') {
            var url = "{{ url('/api/pegawai/delete') }}/" + id;
            var status = 'delete';
        } else if (tabel == 'cuti') {
            var url = "{{ url('/api/cuti/delete') }}/" + id;
            var status = 'delete';
        }

        //fitur swal
        $(this).find('.textbox').each(function() {
            if (!$(this).val()) {
                get_error_text(this);
                valid = false;
                $('html,body').animate({
                    scrollTop: 0
                }, "slow");
            }
            if ($(this).hasClass('no-valid')) {
                valid = false;
                $('html,body').animate({
                    scrollTop: 0
                }, "slow");
            }
        });
        if (valid) {
            Swal.fire({
                title: 'Konfirmasi delete data',
                text: "Data tidak akan dimunculkan lagi",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: "#1da1f2",
                confirmButtonText: "Yakin, dong!",
                cancelButtonColor: '#d33',
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        url: url,
                        type: "POST",
                        //jika ajax sukses
                        success: function(data) {
                            swal.fire({
                                title: "penghapusan data berhasil",
                                icon: "success"
                            }).then((result) => {
                                if (result.value) {
                                    $('form').trigger("reset");
                                    $('#tabel_karyawan').DataTable().ajax.reload();
                                    $('#tabel_cuti').DataTable().ajax.reload();
                                    $('#tabel_pegawai_ambil_cuti').DataTable().ajax
                                        .reload();
                                }
                            })
                        },
                        //jika ajax gagal
                        error: function(xhr, ajaxOptions, thrownError) {
                            setTimeout(function() {
                                swal.fire("Error", "Periksa koneksi anda", "error");
                            }, 2000);
                        }
                    });
                }
            })
        }
    }

    function edit_pegawai(id, no_induk, nama, alamat, tgl_lahir, tgl_gabung) {
        $('input[name="edit_no_induk"]').val(no_induk);
        $('input[name="edit_nama"]').val(nama);
        $('input[name="edit_alamat"]').val(alamat);
        $('input[name="edit_tgl_lahir"]').val(tgl_lahir);
        $('input[name="edit_tgl_gabung"]').val(tgl_gabung);
        $('#edit_data_pegawai').modal('show');
    }

    function edit_cuti(id, no_induk, tgl_cuti, lama_cuti, keterangan) {
        $('input[name="edit_id_cuti"]').val(id);
        $('input[name="edit_no_induk_cuti"]').val(no_induk);
        $('input[name="edit_tgl_cuti"]').val(tgl_cuti);
        $('input[name="edit_lama_cuti"]').val(lama_cuti);
        $('input[name="edit_keterangan_cuti"]').val(keterangan);
        $('#edit_data_cuti').modal('show');
    }

    function tambah_cuti(no_induk) {
        $('input[name="add_no_induk_cuti"]').val(no_induk);
        $('#add_data_cuti').modal('show');
    }

    function reset_form() {
        $('form').trigger("reset");
    }
</script>
