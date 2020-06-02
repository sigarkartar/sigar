<div class="content">
    <div class="container-fluid">
        <?php $y = $this->db->get('galeri')->result() ?>
        <h2 class="mb-5">Tambah Data</h2>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('admin/tambah_dokumentasi') ?>" method="post" enctype="multipart/form-data">
            <select class="form-control" name="nama" required id="">
                <option value="">Pilih Nama Galeri</option>
                <?php foreach ($y as $x) : ?>
                    <option value="<?= $x->id_galeri ?>"><?= $x->nama_galeri ?></option>
                <?php endforeach ?>
            </select><br>
            <div class="form-control">
                <label>Gambar</label>
                <input type="file" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Tambahkan
            </button>
        </form>
    </div>
</div>