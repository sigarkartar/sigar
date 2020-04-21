<div class="container" style="margin-top: 100px">
    <!-- <p class="text-center">Belum Pernah Mengajukan Permohonan?</p>
    <a href="<?= base_url('user/daftar') ?>" style="display: block; margin:auto; width:300px; border-radius: 30px; background: #c6d4e1; color:black" class="btn btn-primary">Buat Permohonan Baru</a><br>
    <hr class="mb-5"> -->
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class=" box" style="background: #ebe7e0; padding: 20px; margin-right: auto; box-shadow: 0 0 10px 5px black; opacity: 0.9;">
                <?= $this->session->flashdata('message') ?>
                <h4 class="text-center mb-5">FORM PERMOHONAN</h4>
                <form action="<?= base_url('user') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>ID Pelanggan</label>
                        <input type="number" class="form-control" name="idpel" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" required>
                    </div>
                    <div class="form-group">
                        <label>PK Geser Meter</label>
                        <input type="text" class="form-control" name="pk" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pembayaran</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label>Biaya</label>
                        <input type="number" class="form-control" name="biaya" required>
                    </div>
                    <div class="form-group">
                        <label>Dokumentasi</label>
                        <input type="file" class="form-control" name="foto" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="display: block; margin:auto; background: #bdb8ad; color:black">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>