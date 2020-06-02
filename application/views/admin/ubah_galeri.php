<div class="content">
    <div class="container-fluid">
        <?php $id = $this->input->get('id');
        $x = $this->db->get_where('galeri', ['id_galeri' => $id])->row_array();
        ?>
        <h2 class="mb-5">Tambah Galeri</h2>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('admin/ubah_galeri') ?>" method="post">
            <input type="hidden" name="id" value="<?= $x['id_galeri'] ?>" id="">
            <div class="form-group">
                <label>Nama Galeri</label>
                <input type="text" class="form-control form-control-user" name="nama" required value="<?= $x['nama_galeri'] ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Tambahkan
            </button>
        </form>
    </div>
</div>