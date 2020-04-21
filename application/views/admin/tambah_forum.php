<div class="content">
    <div class="container-fluid">
        <h2 class="mb-5">Tambah Forum</h2>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('admin/tambah_forum') ?>" method="post">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label>Pertanyaan</label>
                <input type="text" class="form-control" name="pertanyaan" required>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Tambahkan
            </button>
        </form>
    </div>
</div>