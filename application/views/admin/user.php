<div class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <table class="table table-bordered" style="text-align: center">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th></th>
            </tr>
            <?php
            $no = 1;
            foreach ($user as $x) {
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $x['nama']; ?></td>
                    <td><?php echo $x['username']; ?></td>
                    <td>
                        <a href="<?= base_url('admin/ubah_data_user') ?>?id=<?= $x['id_user'] ?>" type="submit" class="btn btn-warning">Ubah</a>
                        <br><a href="<?= base_url('admin/hapus_user') ?>?id=<?= $x['id_user'] ?>" class="btn btn-danger tombol-hapus">Hapus</a>
                    </td>
                </tr>
                <?php $no++; ?>
            <?php
            }
            ?>
        </table>
        <a href="<?= base_url('admin/tambah_user') ?>" class="btn btn-primary">Tambah Admin</a>
    </div>
</div>