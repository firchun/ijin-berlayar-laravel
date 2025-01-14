@extends('layouts.auth')

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-primary mb-2 font-weight-bold">
                                            {{ env('APP_NAME') ?? 'Perijinan Berlayar' }}</h1>
                                        <h1 class="h4 text-gray-900 mb-4">{{ __('Verifikasi alamat E-mail') }}</h1>
                                    </div>

                                    @if (session('resent'))
                                        <div class="alert alert-success border-left-success" role="alert">
                                            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                                        </div>
                                    @endif

                                    {{ __('Sebelum di proses, silahkan check E-mail untuk link verifikasi') }}
                                    {{ __('Jika anda belum mendapatkan link verifikasi pada E-mail') }}, <a
                                        href="{{ route('verification.resend') }}">{{ __('Klik untuk kirim ulang') }}</a>.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
