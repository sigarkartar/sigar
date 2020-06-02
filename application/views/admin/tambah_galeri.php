<div class="content">
    <div class="container-fluid">
        <h2 class="mb-5">Tambah Galeri</h2>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('admin/tambah_galeri') ?>" method="post">
            <div class="form-group">
                <label>Nama Galeri</label>
                <input type="text" class="form-control form-control-user" name="nama" required>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Tambahkan
            </button>
        </form>
    </div>
</div>