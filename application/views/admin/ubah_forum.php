<?php
$id = $this->input->get('id');
$query = $this->db->get_where('forum', ['id_forum' => $id])->row_array();
?>
<div class="content">
    <div class="container-fluid">
        <h2>Ubah Forum</h2>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('admin/ubah_forum') ?>" method="post">
            <input type="hidden" name="id" value="<?= $query['id_forum'] ?>">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= $query['nama'] ?>" required>
            </div>
            <div class="form-group">
                <label>Pertanyaan</label>
                <input type="text" class="form-control" name="pertanyaan" value="<?= $query['pertanyaan'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Ubah
            </button>
        </form>
    </div>
</div>