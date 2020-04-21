<div class="content">
    <div class="container-fluid">
        <?php
        $id = $this->input->get('id');
        ?>
        <h2 class="mb-5">Tambah Forum</h2>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('admin/tambah_jawaban') ?>" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label>Jawaban</label>
                <input type="text" class="form-control" name="jawaban" required>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Tambahkan
            </button>
        </form>
    </div>
</div>