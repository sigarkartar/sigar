<div class="content">
    <div class="container-fluid">
        <h2 class="mb-5">Tambah Aspirasi</h2>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('admin/tambah_aspirasi') ?>" method="post">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label>Aspirasi</label>
                <input type="text" class="form-control" name="aspirasi" required>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Tambahkan
            </button>
        </form>
    </div>
</div>