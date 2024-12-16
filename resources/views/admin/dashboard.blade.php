@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if (Auth::user()->role != 'User')
        <div class="row justify-content-center">
            @include('admin._components.card', [
                'title' => 'Akun Pimpinan',
                'count' => $widget['pimpinan'],
                'color' => 'warning',
                'icon' => 'users',
            ])
            @include('admin._components.card', [
                'title' => 'Akun Staff',
                'count' => $widget['staff'],
                'color' => 'warning',
                'icon' => 'users',
            ])
            @include('admin._components.card', [
                'title' => 'Akun Pengguna',
                'count' => $widget['user'],
                'color' => 'warning',
                'icon' => 'users',
            ])
        </div>
    @else
        @php
            $check_berkas = App\Models\BerkasUser::where('id_user', Auth::id())->latest()->first();

            if ($check_berkas) {
                $menu_user = true;
            } else {
                $menu_user = false;
            }
        @endphp
        @if ($menu_user == true)
            @if ($check_berkas->diterima == 0)
                <div class="alert alert-warning border-left-warning alert-dismissible fade show" role="alert">
                    Berkas anda sedang dalam proses, harap untuk menunggu..<br>Harap cek secara berkala..

                </div>
            @else
                @include('admin._components.list_kapal')
            @endif
        @else
            @include('admin._components.form_berkas')
        @endif
    @endif
@endsection
