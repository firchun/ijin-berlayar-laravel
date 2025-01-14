<!-- Modal for Create -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Kapal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Create Form -->
                <form id="createKapalForm">
                    <div class="mb-3">
                        <label for="createNamaKapal" class="form-label">Nama Kapal</label>
                        <input type="text" class="form-control" id="createNamaKapal" name="nama_kapal"
                            placeholder="Masukkan nama kapal" required>
                    </div>
                    <div class="mb-3">
                        <label for="createJenisKapal" class="form-label">Jenis Kapal</label>
                        <input type="text" class="form-control" id="createJenisKapal" name="jenis_kapal"
                            placeholder="Masukkan jenis kapal" required>
                    </div>
                    <div class="mb-3">
                        <label for="createDimensiKapal" class="form-label">Dimensi Kapal</label>
                        <input type="text" class="form-control" id="createDimensiKapal" name="dimensi_kapal"
                            placeholder="Masukkan dimensi kapal">
                    </div>
                    <div class="mb-3">
                        <label for="createBahanKapal" class="form-label">Bahan Kapal</label>
                        <input type="text" class="form-control" id="createBahanKapal" name="bahan_kapal"
                            placeholder="Masukkan bahan kapal">
                    </div>
                    <div class="mb-3">
                        <label for="createJumlahKru" class="form-label">Jumlah Kru</label>
                        <input type="number" class="form-control" id="createJumlahKru" name="jumlah_kru" value="1"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="createPenyimpanan" class="form-label">Penyimpanan</label>
                        <input type="text" class="form-control" id="createPenyimpanan" name="penyimpanan"
                            placeholder="Masukkan penyimpanan">
                    </div>
                    <div class="mb-3">
                        <label for="createAlatTangkap" class="form-label">Alat Tangkap</label>
                        <input type="text" class="form-control" id="createAlatTangkap" name="alat_tangkap"
                            placeholder="Masukkan alat tangkap">
                    </div>
                    <div class="mb-3">
                        <label for="createAlatKeselamatan" class="form-label">Alat Keselamatan</label>
                        <input type="text" class="form-control" id="createAlatKeselamatan" name="alat_keselamatan"
                            placeholder="Masukkan alat keselamatan">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                <h5 class="modal-title" id="updateModalLabel">Update Kapal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Update Form -->
                <form id="updateKapalForm">
                    <input type="hidden" id="updateKapalId" name="id"> <!-- Hidden input for the ID -->

                    <div class="mb-3">
                        <label for="updateNamaKapal" class="form-label">Nama Kapal</label>
                        <input type="text" class="form-control" id="updateNamaKapal" name="nama_kapal"
                            placeholder="Masukkan nama kapal" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateJenisKapal" class="form-label">Jenis Kapal</label>
                        <input type="text" class="form-control" id="updateJenisKapal" name="jenis_kapal"
                            placeholder="Masukkan jenis kapal" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateDimensiKapal" class="form-label">Dimensi Kapal</label>
                        <input type="text" class="form-control" id="updateDimensiKapal" name="dimensi_kapal"
                            placeholder="Masukkan dimensi kapal">
                    </div>
                    <div class="mb-3">
                        <label for="updateBahanKapal" class="form-label">Bahan Kapal</label>
                        <input type="text" class="form-control" id="updateBahanKapal" name="bahan_kapal"
                            placeholder="Masukkan bahan kapal">
                    </div>
                    <div class="mb-3">
                        <label for="updateJumlahKru" class="form-label">Jumlah Kru</label>
                        <input type="number" class="form-control" id="updateJumlahKru" name="jumlah_kru" required>
                    </div>
                    <div class="mb-3">
                        <label for="updatePenyimpanan" class="form-label">Penyimpanan</label>
                        <input type="text" class="form-control" id="updatePenyimpanan" name="penyimpanan"
                            placeholder="Masukkan penyimpanan">
                    </div>
                    <div class="mb-3">
                        <label for="updateAlatTangkap" class="form-label">Alat Tangkap</label>
                        <input type="text" class="form-control" id="updateAlatTangkap" name="alat_tangkap"
                            placeholder="Masukkan alat tangkap">
                    </div>
                    <div class="mb-3">
                        <label for="updateAlatKeselamatan" class="form-label">Alat Keselamatan</label>
                        <input type="text" class="form-control" id="updateAlatKeselamatan"
                            name="alat_keselamatan" placeholder="Masukkan alat keselamatan">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateKapalBtn">Save</button>
            </div>
        </div>
    </div>
</div>
