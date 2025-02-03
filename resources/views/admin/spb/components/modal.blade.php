<!-- Modal for Create -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Pengajuan Baru</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Create Form -->
                <form id="createKapalForm">
                    <div class="mb-3">
                        <label for="createIdKapal" class="form-label">Pilih Kapal</label>
                        <select name="id_kapal" class="form-control" id="createIdKapal">
                            @foreach (App\Models\Kapal::where('id_user', Auth::id())->get() as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kapal }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="createNamaNahkoda" class="form-label">Nama Nahkoda</label>
                        <input type="text" class="form-control" id="createNamaNahkoda" name="nama_nahkoda"
                            placeholder="Masukkan nama nahkoda" required>
                    </div>
                    <div class="mb-3">
                        <label for="createKapasitasKapal" class="form-label">Kapasitas Kapal</label>
                        <input type="number" step="0.01" class="form-control" id="createKapasitasKapal"
                            name="kapasitas_kapal" placeholder="Masukkan kapasitas kapal (ton)" required>
                    </div>
                    <div class="mb-3">
                        <label for="createJumlahAbk" class="form-label">Jumlah ABK</label>
                        <input type="number" class="form-control" id="createJumlahAbk" name="jumlah_abk"
                            placeholder="Masukkan jumlah ABK" required>
                    </div>
                    <div class="mb-3">
                        <label for="createTglKeberangkatan" class="form-label">Tanggal Keberangkatan</label>
                        <input type="date" class="form-control" id="createTglKeberangkatan" name="tgl_keberangkatan"
                            required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="createUserBtn">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal for Update -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Pengajuan</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Update Form -->
                <form id="updateKapalForm">
                    <input type="hidden" id="updateKapalId" name="id"> <!-- Hidden input for the ID -->
                    <div class="mb-3">
                        <label for="updateIdKapal" class="form-label">Pilih Kapal</label>
                        <select name="id_kapal" class="form-control" id="updateIdKapal">
                            @foreach (App\Models\Kapal::where('id_user', Auth::id())->get() as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kapal }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="updateNamaNahkoda" class="form-label">Nama Nahkoda</label>
                        <input type="text" class="form-control" id="updateNamaNahkoda" name="nama_nahkoda"
                            placeholder="Masukkan nama nahkoda" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateKapasitasKapal" class="form-label">Kapasitas Kapal</label>
                        <input type="number" step="0.01" class="form-control" id="updateKapasitasKapal"
                            name="kapasitas_kapal" placeholder="Masukkan kapasitas kapal (ton)" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateJumlahAbk" class="form-label">Jumlah ABK</label>
                        <input type="number" class="form-control" id="updateJumlahAbk" name="jumlah_abk"
                            placeholder="Masukkan jumlah ABK" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateTglKeberangkatan" class="form-label">Tanggal Keberangkatan</label>
                        <input type="date" class="form-control" id="updateTglKeberangkatan"
                            name="tgl_keberangkatan" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateKapalBtn">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Permohonan -->
<div class="modal fade" id="modelDetail" tabindex="-1" aria-labelledby="modelDetailLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold" id="modelDetailLabel">Detail Permohonan</h5>
                <button type="button" class="btn text-white border-0" data-dismiss="modal"
                    aria-label="Close">✖</button>
            </div>
            <div class="modal-body">
                <h6 class="fw-bold">Informasi Nahkoda</h6>
                <table class="table table-sm table-striped table-hover">
                    <tbody>
                        <tr>
                            <th>Nama Nahkoda</th>
                            <td id="nama_nahkoda"></td>
                        </tr>
                        <tr>
                            <th>Kapasitas Kapal</th>
                            <td id="kapasitas_kapal"></td>
                        </tr>
                        <tr>
                            <th>Jumlah ABK</th>
                            <td id="jumlah_abk"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Keberangkatan</th>
                            <td id="tgl_keberangkatan"></td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <h6 class="fw-bold">Informasi Kapal</h6>
                <table class="table table-sm table-striped table-hover">
                    <tbody>
                        <tr>
                            <th>Nama Kapal</th>
                            <td id="nama_kapal"></td>
                        </tr>
                        <tr>
                            <th>Jenis</th>
                            <td id="jenis_kapal"></td>
                        </tr>
                        <tr>
                            <th>Dimensi</th>
                            <td id="dimensi_kapal"></td>
                        </tr>
                        <tr>
                            <th>Bahan</th>
                            <td id="bahan_kapal"></td>
                        </tr>
                        <tr>
                            <th>Jumlah Kru</th>
                            <td id="jumlah_kru"></td>
                        </tr>
                        <tr>
                            <th>Penyimpanan</th>
                            <td id="penyimpanan"></td>
                        </tr>
                        <tr>
                            <th>Alat Tangkap</th>
                            <td id="alat_tangkap"></td>
                        </tr>
                        <tr>
                            <th>Alat Keselamatan</th>
                            <td id="alat_keselamatan"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary btn-sm" onclick="detailBerkas()">Lihat Berkas</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="rekomendasiModal" tabindex="-1" aria-labelledby="rekomendasiModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rekomendasiModalLabel">Buat Rekomendasi</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="rekomendasiForm">
                    <input type="hidden" id="id_permohonan_berlayar" name="id_permohonan_berlayar">
                    <div class="p-2 border mb-3 "
                        style="background-color: rgba(4, 130, 255, 0.363); border-radius:10px;">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nama_barang" class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                        required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" id="jumlah" name="jumlah"
                                        required value="0">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="satuan" class="form-label">Satuan</label>
                                    <input type="text" class="form-control" id="satuan" name="satuan"
                                        required value="Kg">
                                </div>
                            </div>
                        </div>
                        <button type="button" id="simpanRekomendasi" class="btn btn-primary"><i
                                class="fa fa-plus"></i> Tambah</button>
                    </div>
                </form>
                <hr>
                <table class="table table-hover table-striped table-bordered display" id="datatable-rekomendasi"
                    style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="ajukanRekomendasi" class="btn btn-primary"><i
                        class="fa-solid fa-arrow-up-right-from-square"></i>
                    Ajukan Rekomendasi</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="verifikasiPermohonan" tabindex="-1" aria-labelledby="rekomendasiModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rekomendasiModalLabel">Verifikasi Pengajuan</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-striped table-bordered display"
                    id="datatable-rekomendasi-verifikasi" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="verifikasiPermohonanBtn" class="btn btn-primary"><i
                        class="fa-solid fa-check"></i>
                    Verifikasi Pengajuan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="updateRekomendasiModal" tabindex="-1" aria-labelledby="rekomendasiModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rekomendasiModalLabel">Konfirmasi</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="updateRekomendasiForm">
                    <div class="mb-3">
                        <label for="">Nomor Rekomendasi</label>
                        <input type="text" id="no_rekomendasi" name="no_rekomendasi" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="button" id="ajukanUpdateRekomendasi" class="btn btn-primary">
                    Ajukan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modelDetailPermohonan" tabindex="-1" aria-labelledby="rekomendasiModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rekomendasiModalLabel">Detail Berkas</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

