@push('js')
    <script>
        $(function() {
            $('#datatable-kapal').DataTable({
                processing: true,
                serverSide: false,
                responsive: false,
                ajax: '{{ url('spb-datatable') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'kapal.nama_kapal',
                        name: 'kapal.nama_kapal'
                    },
                    {
                        data: 'nama_nahkoda',
                        name: 'nama_nahkoda'
                    },
                    {
                        data: 'verifikasi_keberangkatan',
                        name: 'verifikasi_keberangkatan'
                    }, {
                        data: 'verifikasi_kepulangan',
                        name: 'verifikasi_kepulangan'
                    }
                ]
            });

            window.updateJadwal = function(id) {
                $('#updateJadwalModal').modal('show');
                $('#id_permohonan_berlayar').val(id);
                $('#simpanTangkapan').click(function() {
                    var formData = $('#tangkapanForm').serialize();

                    $.ajax({
                        type: 'POST',
                        url: '/tangkapan/store',
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // alert(response.message);
                            $('#datatable-tangkapan').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            alert('Terjadi kesalahan: ' + xhr.responseText);
                        }
                    });
                });
                $('#konfirmasiKepulangan').click(function() {
                    var formData = $('#updateKepulanganForm').serialize();

                    $.ajax({
                        type: 'POST',
                        url: '/tangkapan/update-kedatangan/' + id,
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            $('#updateJadwalModal').modal('hide');
                            $('#updateKepulanganModal').modal('hide');
                            $('#datatable-kapal').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            alert('Terjadi kesalahan: ' + xhr.responseText);
                        }
                    });
                });
                $('#updateKepulangan').click(function() {
                    $('#updateKepulanganModal').modal('show');
                });
                var table = $('#datatable-tangkapan').DataTable();
                if ($.fn.DataTable.isDataTable('#datatable-tangkapan')) {
                    table.clear().destroy();
                }
                $('#datatable-tangkapan').DataTable({
                    processing: true,
                    serverSide: false,
                    responsive: false,
                    ajax: '{{ url('tangkapan-datatable') }}/' + id,
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },

                        {
                            data: 'nama_tangkapan',
                            name: 'nama_tangkapan'
                        },
                        {
                            data: 'jenis_ikan',
                            name: 'jenis_ikan'
                        },
                        {
                            data: 'jumlah',
                            name: 'jumlah'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        }
                    ]
                });

                window.deleteTangkapan = function(id) {
                    if (confirm('Apakah Anda yakin ingin menghapus tangkapan ini?')) {
                        $.ajax({
                            type: 'DELETE',
                            url: '/tangkapan/delete/' + id,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                // alert(response.message);
                                // Refresh DataTable setelah menghapus pengguna
                                $('#datatable-tangkapan').DataTable().ajax.reload();
                            },
                            error: function(xhr) {
                                alert('Terjadi kesalahan: ' + xhr.responseText);
                            }
                        });
                    }
                };
            };
            window.updateKeberangkatan = function(id) {
                $('#updateKeberangkatanModal').modal('show');
                $('#konfirmasiKeberangkatan').click(function() {
                    var formData = $('#updateKeberangkatanForm').serialize();

                    $.ajax({
                        type: 'POST',
                        url: '/tangkapan/update-keberangkatan/' + id,
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            $('#updateKeberangkatanModal').modal('hide');
                            $('#datatable-kapal').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            alert('Terjadi kesalahan: ' + xhr.responseText);
                        }
                    });
                });
            };
            window.detailTangkapan = function(id) {
                $('#detailTangkapanModal').modal('show');
                var table = $('#datatable-detail-tangkapan').DataTable();
                if ($.fn.DataTable.isDataTable('#datatable-detail-tangkapan')) {
                    table.clear().destroy();
                }
                $('#datatable-detail-tangkapan').DataTable({
                    processing: true,
                    serverSide: false,
                    responsive: false,
                    ajax: '{{ url('tangkapan-datatable') }}/' + id,
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },

                        {
                            data: 'nama_tangkapan',
                            name: 'nama_tangkapan'
                        },
                        {
                            data: 'jenis_ikan',
                            name: 'jenis_ikan'
                        },
                        {
                            data: 'jumlah',
                            name: 'jumlah'
                        },

                    ]
                });
            };

        });
    </script>
@endpush
