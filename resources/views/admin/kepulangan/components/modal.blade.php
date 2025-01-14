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
