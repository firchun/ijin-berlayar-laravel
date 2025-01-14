@extends('layouts.admin')

@section('main-content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">{{ $title ?? 'Title' }}</h5>

                </div>
                <div class="card-body">
                    <div class="card-datatable table-responsive">
                        <table id="datatable-kapal" class="table table-hover table-bordered display">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Kapal</th>
                                    <th>Nama Nahkoda</th>
                                    <th>Cetak</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Kapal</th>
                                    <th>Nama Nahkoda</th>
                                    <th>Cetak</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.logistik.components.modal')
@endsection
@include('admin.logistik.script')
