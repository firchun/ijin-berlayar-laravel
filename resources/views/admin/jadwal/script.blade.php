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
                        data: 'update_jadwal',
                        name: 'update_jadwal'
                    }
                ]
            });

            window.updateJadwal = function(id) {
                $('#updateJadwalModal').modal('show');
            };

        });
    </script>
@endpush
