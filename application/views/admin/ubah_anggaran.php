<?php
$id = $this->input->get('id');
$query = $this->db->get_where('anggaran', ['id_anggaran' => $id])->row_array();
?>
<div class="content">
    <div class="container-fluid">
        <h2 class="mb-5">Ubah Anggaran</h2>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('admin/ubah_anggaran') ?>" method="post">
            <input type="hidden" value="<?= $query['id_anggaran'] ?>" name="id">
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal" required value="<?= $query['tanggal_anggaran'] ?>">
            </div>
            <select name="jenis" class="form-control" required>
                <option value="">Pilih Jenis Anggaran</option>
                <option <?php if ($query['jenis_anggaran'] == "pemasukan") { ?> selected <?php } ?> value="pemasukan">Pemasukan</option>
                <option <?php if ($query['jenis_anggaran'] == "pengeluaran") { ?> selected <?php } ?> value="pengeluaran">Pengeluaran</option>
            </select><br>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="jumlah" required value="<?= $query['jumlah'] ?>">
            </div>
            <div class="form-group">
                <label>Ketereangan</label>
                <input type="text" class="form-control" name="keterangan" required value="<?= $query['keterangan'] ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Tambahkan
            </button>
        </form>
    </div>
</div>