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
                        data: 'verifikasi_kepulangan',
                        name: 'verifikasi_kepulangan'
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
