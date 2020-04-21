<?php
$id = $this->input->get('id');
$query = $this->db->get_where('balasan', ['id_balasan' => $id])->row_array();
?>
<div class="content">
    <div class="container-fluid">
        <h2>Ubah Forum</h2>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('admin/ubah_jawaban') ?>" method="post">
            <input type="hidden" name="id" value="<?= $query['id_balasan'] ?>">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= $query['nama_balasan'] ?>" required>
            </div>
            <div class="form-group">
                <label>Jawaban</label>
                <input type="text" class="form-control" name="jawaban" value="<?= $query['jawaban'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Ubah
            </button>
        </form>
    </div>
</div>