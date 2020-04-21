<?php
$id = $this->input->get('id');
$query = $this->db->get_where('jadwal', ['id_jadwal' => $id])->row_array();
?>
<div class="content">
    <div class="container-fluid">
        <h2 class="mb-5">Ubah Jadwal</h2>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('admin/ubah_jadwal') ?>" method="post">
            <input type="hidden" name="id" value="<?= $query['id_jadwal'] ?>">
            <div class="form-group">
                <label>Nama Kegiatan</label>
                <input type="text" class="form-control" name="nama" required value="<?= $query['nama_jadwal'] ?>">
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal" required value="<?= $query['tanggal_jadwal'] ?>">
            </div>
            <div class="form-group">
                <label>Deskripsi Kegiatan</label>
                <input type="text" class="form-control" name="deskripsi" required value="<?= $query['deskripsi'] ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Ubah
            </button>
        </form>
    </div>
</div>