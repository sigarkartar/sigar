<?php
$id = $this->input->get('id');
$query = $this->db->get_where('aspirasi', ['id_aspirasi' => $id])->row_array();
?>
<div class="content">
    <div class="container-fluid">
        <h2>Ubah Aspirasi</h2>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('admin/ubah_aspirasi') ?>" method="post">
            <input type="hidden" name="id" value="<?= $query['id_aspirasi'] ?>">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= $query['nama'] ?>" required>
            </div>
            <div class="form-group">
                <label>Aspirasi</label>
                <input type="text" class="form-control" name="aspirasi" value="<?= $query['aspirasi'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Ubah Aspirasi
            </button>
        </form>
    </div>
</div>