<div class="content">
    <div class="container-fluid">
        <h2 class="mb-5">Tambah Jadwal</h2>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('admin/tambah_jadwal') ?>" method="post">
            <div class="form-group">
                <label>Nama Kegiatan</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal" required>
            </div>
            <div class="form-group">
                <label>Deskripsi Kegiatan</label>
                <input type="text" class="form-control" name="deskripsi" required>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Tambahkan
            </button>
        </form>
    </div>
</div>