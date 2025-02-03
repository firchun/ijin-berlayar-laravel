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
                        data: 'jumlah_abk',
                        name: 'jumlah_abk'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },


                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });

            $('.create-new').click(function() {
                $('#createModal').modal('show');
            });
            window.editUser = function(id) {
                $.ajax({
                    type: 'GET',
                    url: '/users/edit/' + id,
                    success: function(response) {
                        $('#UsersModalLabel').text('Edit User');
                        $('#formUserId').val(response.id);
                        $('#formUserName').val(response.name);
                        $('#formUserEmail').val(response.email);
                        $('#updateModal').modal('show');
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            };
            $('#updateKapalBtn').click(function() {
                var formData = $('#userForm').serialize();

                $.ajax({
                    type: 'POST',
                    url: '/kapal/store',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.message);
                        $('#datatable-kapal').DataTable().ajax.reload();
                        $('#updateModal').modal('hide');
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            });
            $('#createUserBtn').click(function() {
                var formData = $('#createKapalForm').serialize();

                $.ajax({
                    type: 'POST',
                    url: '/spb/store',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.message);
                        $('#datatable-kapal').DataTable().ajax.reload();
                        $('#createModal').modal('hide');
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            });

            window.detailUser = function(id) {
                fetch(`/detail-spb/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        $('#nama_nahkoda').text(data.nama_nahkoda);
                        $('#kapasitas_kapal').text(data.kapasitas_kapal);
                        $('#jumlah_abk').text(data.jumlah_abk);
                        $('#tgl_keberangkatan').text(data.tgl_keberangkatan);
                        $('#id_kapal').text(data.id_kapal);

                        // Data Kapal
                        $('#nama_kapal').text(data.kapal.nama_kapal);
                        $('#jenis_kapal').text(data.kapal.jenis_kapal);
                        $('#dimensi_kapal').text(data.kapal.dimensi_kapal);
                        $('#bahan_kapal').text(data.kapal.bahan_kapal);
                        $('#jumlah_kru').text(data.kapal.jumlah_kru);
                        $('#penyimpanan').text(data.kapal.penyimpanan);
                        $('#alat_tangkap').text(data.kapal.alat_tangkap);
                        $('#alat_keselamatan').text(data.kapal.alat_keselamatan);
                        $('#modelDetail').attr('data-id-kapal', data.id_kapal);

                        $('#modelDetail').modal('show');
                    })
                    .catch(error => console.error('Error:', error));
            };

            window.detailBerkas = function() {
                let id_kapal = $('#modelDetail').attr('data-id-kapal');
                if (id_kapal) {
                    $('#modelDetailPermohonan').modal('show');
                    $('#modelDetailPermohonan .modal-body').html('<p>Loading...</p>');

                    $.ajax({
                        url: `/berkas-user/${id_kapal}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            let content = `
                                <ul>
                                    <li><strong>KTP:</strong> <a href="${response.file_ktp}" target="_blank">Lihat Berkas</a></li>
                                    <li><strong>PKL:</strong> <a href="${response.file_pkl}" target="_blank">Lihat Berkas</a></li>
                                    <li><strong>BPJS:</strong> <a href="${response.file_bpjs}" target="_blank">Lihat Berkas</a></li>
                                    <li><strong>Sertifikat Kapal:</strong> <a href="${response.file_sertif_kapal}" target="_blank">Lihat Berkas</a></li>
                                    <li><strong>Surat Kesehatan:</strong> <a href="${response.file_kesehatan}" target="_blank">Lihat Berkas</a></li>
                                </ul>
                            `;
                            $('#modelDetailPermohonan .modal-body').html(content);
                        },
                        error: function() {
                            $('#modelDetailPermohonan .modal-body').html(
                                '<p class="text-danger">Gagal memuat data berkas.</p>');
                        }
                    });
                } else {
                    alert('ID Kapal tidak ditemukan.');
                }
            }

            window.terimaUser = function(id) {
                $('#rekomendasiModal').modal('show');
                $('#id_permohonan_berlayar').val(id);
                $('#simpanRekomendasi').click(function() {
                    var formData = $('#rekomendasiForm').serialize();

                    $.ajax({
                        type: 'POST',
                        url: '/rekomendasi/store',
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // alert(response.message);
                            $('#datatable-rekomendasi').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            alert('Terjadi kesalahan: ' + xhr.responseText);
                        }
                    });
                });
                $('#ajukanUpdateRekomendasi').click(function() {
                    var formData = $('#updateRekomendasiForm').serialize();

                    $.ajax({
                        type: 'POST',
                        url: '/rekomendasi/update-permohonan/' + id,
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            $('#rekomendasiModal').modal('hide');
                            $('#updateRekomendasiModal').modal('hide');
                            $('#datatable-kapal').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            alert('Terjadi kesalahan: ' + xhr.responseText);
                        }
                    });
                });
                $('#ajukanRekomendasi').click(function() {
                    $('#updateRekomendasiModal').modal('show');
                });
                var table = $('#datatable-rekomendasi').DataTable();
                if ($.fn.DataTable.isDataTable('#datatable-rekomendasi')) {
                    table.clear().destroy();
                }
                $('#datatable-rekomendasi').DataTable({
                    processing: true,
                    serverSide: false,
                    responsive: false,
                    ajax: '{{ url('rekomendasi-datatable') }}/' + id,
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },

                        {
                            data: 'nama_barang',
                            name: 'nama_barang'
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
                window.deleteRekomendasi = function(id) {
                    if (confirm('Apakah Anda yakin ingin menghapus rekomendasi ini?')) {
                        $.ajax({
                            type: 'DELETE',
                            url: '/rekomendasi/delete/' + id,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                // alert(response.message);
                                // Refresh DataTable setelah menghapus pengguna
                                $('#datatable-rekomendasi').DataTable().ajax.reload();
                            },
                            error: function(xhr) {
                                alert('Terjadi kesalahan: ' + xhr.responseText);
                            }
                        });
                    }
                };
            };
            window.verifikasiUser = function(id) {
                $('#verifikasiPermohonan').modal('show');
                $('#id_permohonan_berlayar').val(id);
                $('#verifikasiPermohonanBtn').click(function() {
                    $.ajax({
                        type: 'POST',
                        url: '/rekomendasi/verifikasi/' + id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            alert(response.message);
                            $('#verifikasiPermohonan').modal('hide');
                            $('#datatable-kapal').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            alert('Terjadi kesalahan: ' + xhr.responseText);
                        }
                    });
                });
                var table = $('#datatable-rekomendasi').DataTable();
                if ($.fn.DataTable.isDataTable('#datatable-rekomendasi')) {
                    table.clear().destroy();
                }
                $('#datatable-rekomendasi-verifikasi').DataTable({
                    processing: true,
                    serverSide: false,
                    responsive: false,
                    ajax: '{{ url('rekomendasi-datatable') }}/' + id,
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },

                        {
                            data: 'nama_barang',
                            name: 'nama_barang'
                        },
                        {
                            data: 'jumlah',
                            name: 'jumlah'
                        },
                    ]
                });

            };
            window.downloadUser = function(id) {
                window.open('/report/spb/' + id, '_blank');
            };
            window.deleteUser = function(id) {
                if (confirm('Apakah Anda yakin ingin menghapus permohonan ini?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/spb/delete/' + id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            alert(response.message);
                            // Refresh DataTable setelah menghapus pengguna
                            $('#datatable-kapal').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            alert('Terjadi kesalahan: ' + xhr.responseText);
                        }
                    });
                }
            };
        });
    </script>
@endpush
