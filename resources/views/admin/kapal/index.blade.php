@extends('layouts.admin')

@section('main-content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">{{ $title ?? 'Title' }}</h5>
                    <div class="ms-auto">
                        <button class="btn btn-primary create-new" type="button" data-bs-toggle="modal"
                            data-bs-target="#create">
                            <span>
                                <i class="bx bx-plus me-sm-1"></i>
                                <span class="d-none d-sm-inline-block"><i class="fa fa-plus"></i> Tambah Kapal</span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-datatable table-responsive">
                        <table id="datatable-kapal" class="table table-hover table-bordered display">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Kapal</th>
                                    <th>Bahan Kapal</th>
                                    <th>jumlah kru</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Kapal</th>
                                    <th>Bahan Kapal</th>
                                    <th>jumlah kru</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.kapal.components.modal')
@endsection
@include('admin.kapal.script')
