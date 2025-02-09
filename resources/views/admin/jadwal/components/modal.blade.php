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
<div class="modal fade" id="updateJadwalModal" tabindex="-1" aria-labelledby="rekomendasiModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rekomendasiModalLabel">Update Kepulangan</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="tangkapanForm">
                    <input type="hidden" id="id_permohonan_berlayar" name="id_permohonan_berlayar">
                    <div class="p-2 border mb-3 "
                        style="background-color: rgba(4, 130, 255, 0.363); border-radius:10px;">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nama_barang" class="form-label">Nama Tangkapan</label>
                                    <input type="text" class="form-control" id="nama_tangkapan"
                                        name="nama_tangkapan" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jenis Ikan</label>
                                    <input type="text" class="form-control" id="jenis_ikan" name="jenis_ikan"
                                        required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" id="jumlah"
                                        name="jumlah_tangkapan" required value="0">
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
                        <button type="button" id="simpanTangkapan" class="btn btn-primary"><i
                                class="fa fa-plus"></i> Tambah</button>
                    </div>
                </form>
                <hr>
                <table class="table table-hover table-striped table-bordered display" id="datatable-tangkapan"
                    style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Tangkapan</th>
                            <th>Jenis</th>
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
                <button type="button" id="updateKepulangan" class="btn btn-primary"><i
                        class="fa-solid fa-arrow-up-right-from-square"></i>
                    Update Kepulangan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detailTangkapanModal" tabindex="-1" aria-labelledby="rekomendasiModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rekomendasiModalLabel">Detail Tangkapan</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-striped table-bordered display" id="datatable-detail-tangkapan"
                    style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Tangkapan</th>
                            <th>Jenis</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="updateKepulanganModal" tabindex="-1" aria-labelledby="rekomendasiModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rekomendasiModalLabel">Konfirmasi Kepulangan</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="updateKepulanganForm">
                    <div class="mb-3">
                        <label for="">Tanggal Kepulangan</label>
                        <input type="date" id="tgl_kedatangan" name="tgl_kedatangan" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="button" id="konfirmasiKepulangan" class="btn btn-primary">
                    Konfirmasi</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="updateKeberangkatanModal" tabindex="-1" aria-labelledby="rekomendasiModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rekomendasiModalLabel">Konfirmasi Berangkatan</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="updateKeberangkatanForm">
                    <div class="mb-3">
                        <label for="">Tanggal Berlayar</label>
                        <input type="date" id="tgl_keberangkatan" name="tgl_keberangkatan" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="button" id="konfirmasiKeberangkatan" class="btn btn-primary">
                    Konfirmasi</button>
            </div>
        </div>
    </div>
</div>
