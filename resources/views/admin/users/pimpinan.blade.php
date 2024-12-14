@extends('layouts.admin')

@section('main-content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mb-3">
                <div class="dt-buttons btn-group flex-wrap">
                    <button class="btn  create-new btn-primary" type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#create">
                        <span>
                            <i class="fa fa-plus me-sm-1"> </i>
                            <span class="d-none d-sm-inline-block">Tambah Data</span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="card">
                <div class="card-header flex-column flex-md-row">
                    <div class="head-label ">
                        <h5 class="card-title mb-0">{{ $title ?? 'Title' }}</h5>
                    </div>
                </div>
                <div class="card-body">

                    <div class="card-datatable table-responsive">
                        <table id="datatable-users" class="table table-hover table-bordered display table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.users.components.modal')
@endsection
@include('admin.users.script')
