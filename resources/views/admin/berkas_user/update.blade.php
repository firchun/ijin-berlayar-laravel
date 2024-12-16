@extends('layouts.admin')

@section('main-content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4 shadow-lg">
                <form action="{{ route('berkas_user.update-berkas') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h5>kelengkapan berkas</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="file_ktp" class="form-label">File KTP <span class="text-danger">* (Maksimal 2
                                    MB)</span> <a href="{{ Storage::url($berkas->file_ktp) }}" target="__blank">Berkas
                                    Sebelumnya</a></label>
                            <input type="file" class="form-control @error('file_ktp') is-invalid @enderror"
                                id="file_ktp" name="file_ktp">
                            @error('file_ktp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="file_pkl" class="form-label">File PKL <span class="text-danger">* (Maksimal 2
                                    MB)</span> <a href="{{ Storage::url($berkas->file_pkl) }}" target="__blank">Berkas
                                    Sebelumnya</a></label>
                            <input type="file" class="form-control @error('file_pkl') is-invalid @enderror"
                                id="file_pkl" name="file_pkl">
                            @error('file_pkl')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="file_bpjs" class="form-label">File BPJS <span class="text-danger">* (Maksimal 2
                                    MB)</span> <a href="{{ Storage::url($berkas->file_bpjs) }}" target="__blank">Berkas
                                    Sebelumnya</a></label>
                            <input type="file" class="form-control @error('file_bpjs') is-invalid @enderror"
                                id="file_bpjs" name="file_bpjs">
                            @error('file_bpjs')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="file_sertif_kapal" class="form-label">File Sertifikat Kapal <span
                                    class="text-danger">*
                                    (Maksimal 2 MB)</span> <a href="{{ Storage::url($berkas->file_sertif_kapal) }}"
                                    target="__blank">Berkas
                                    Sebelumnya</a></label>
                            <input type="file" class="form-control @error('file_sertif_kapal') is-invalid @enderror"
                                id="file_sertif_kapal" name="file_sertif_kapal">
                            @error('file_sertif_kapal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="file_kesehatan" class="form-label">File Kesehatan <span class="text-danger">*
                                    (Maksimal 2 MB)</span> <a href="{{ Storage::url($berkas->file_kesehatan) }}"
                                    target="__blank">Berkas
                                    Sebelumnya</a></label>
                            <input type="file" class="form-control @error('file_kesehatan') is-invalid @enderror"
                                id="file_kesehatan" name="file_kesehatan">
                            @error('file_kesehatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary">Update Berkas</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
