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
                        data: 'cetak_rekomendasi',
                        name: 'cetak_rekomendasi'
                    }
                ]
            });
            $('.create-new').click(function() {
                $('#createModal').modal('show');
            });
            window.rekomendasiLogistik = function(id) {
                window.open('/report/logistik/' + id, '_blank');
            };
        });
    </script>
@endpush
