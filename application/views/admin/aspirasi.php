<div class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?= $this->session->flashdata('button'); ?>
        <table class="table table-bordered" style="text-align: center">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aspirasi</th>
                <th></th>
            </tr>
            <?php
            $no = 1;
            foreach ($user as $x) {
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $x['nama']; ?></td>
                    <td><?php echo $x['aspirasi']; ?></td>
                    <td>
                        <a href="<?= base_url('admin/ubah_aspirasi') ?>?id=<?= $x['id_aspirasi'] ?>" type="submit" class="btn btn-warning">Ubah</a><br><br>
                        <a href="<?= base_url('admin/hapus_aspirasi') ?>?id=<?= $x['id_aspirasi'] ?>" type="submit" class="btn btn-danger tombol-hapus">Hapus</a>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </table>
        <a class="btn btn-primary" href="<?= base_url('admin/tambah_aspirasi'); ?>">Tambah Aspirasi</a>
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>