<div class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?= $this->session->flashdata('button'); ?>
        <table class="table table-bordered" style="text-align: center">
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th></th>
            </tr>
            <?php
            foreach ($foto as $x) {
            ?>
                <tr>
                    <td><?php echo ++$start; ?></td>
                    <td><img src="<?= base_url('assets/img/galeri/') . $x['foto'] ?>" width="80" alt=""></td>
                    <td>
                        <a href="<?= base_url('admin/hapus_dokumentasi') ?>?id=<?= $x['id_dokumentasi'] ?>" type="submit" class="btn btn-danger tombol-hapus">Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>