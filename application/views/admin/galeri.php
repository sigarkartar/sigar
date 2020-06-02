<div class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?= $this->session->flashdata('button'); ?>
        <table class="table table-bordered" style="text-align: center">
            <tr>
                <th>No</th>
                <th>Nama Galeri</th>
                <th>Dokumentasi</th>
                <th></th>
            </tr>
            <?php
            $no = 1;
            foreach ($user as $x) {
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $x['nama_galeri']; ?></td>
                    <td><a href="<?= base_url('admin/dokumentasi') ?>?id=<?= $x['id_galeri'] ?>"><i class="far fa-images"></i></a></td>
                    <td>
                        <a href="<?= base_url('admin/ubah_galeri') ?>?id=<?= $x['id_galeri'] ?>" type="submit" class="btn btn-warning">Ubah</a><br><br>
                        <a href="<?= base_url('admin/hapus_galeri') ?>?id=<?= $x['id_galeri'] ?>" type="submit" class="btn btn-danger tombol-hapus">Hapus</a>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </table>
        <a class="btn btn-primary" href="<?= base_url('admin/tambah_galeri'); ?>">Tambah Galeri</a>
        <a class="btn btn-outline-danger" href="<?= base_url('admin/tambah_dokumentasi'); ?>">Tambah Foto</a>
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>