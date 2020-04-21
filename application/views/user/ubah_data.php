<?php
$id = $this->input->get('id');
$query = $this->db->get_where('data', ['id_data' => $id])->row_array();
?>
<div class="content">
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-6" style="display: block; margin: auto;">
                <h2 style="text-align: center">Ubah Data</h2><br>
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('user/ubah_data') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $query['id_data'] ?>">
                    <div class="form-group">
                        <label>ID Pelanggan</label>
                        <input type="number" class="form-control" name="idpel" value="<?= $query['id_pelanggan'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?= $query['nama'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?= $query['alamat'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" value="<?= $query['keterangan'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>PK Geser Meter</label>
                        <input type="text" class="form-control" name="pk" value="<?= $query['pk_geser_meter'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pembayaran</label>
                        <input type="date" class="form-control" name="tanggal" value="<?= $query['tanggal_pembayaran'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Biaya</label>
                        <input type="number" class="form-control" name="biaya" value="<?= $query['biaya'] ?>" required>
                    </div>
                    <button style="width: 30%; display:block;margin:auto; border-radius:50px" type="submit" class="btn btn-primary btn-user btn-block">
                        Ubah Data
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>