<div class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?= $this->session->flashdata('button'); ?>
        <table class="table table-bordered" style="text-align: center">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th></th>
            </tr>
            <?php
            foreach ($user as $x) {
            ?>
                <tr>
                    <td><?php echo ++$start; ?></td>
                    <td><?php echo $x['tanggal_anggaran']; ?></td>
                    <td><?php echo $x['jenis_anggaran']; ?></td>
                    <td>Rp. <?php echo number_format($x['jumlah']); ?></td>
                    <td><?php echo $x['keterangan']; ?></td>
                    <td>
                        <a href="<?= base_url('admin/ubah_anggaran') ?>?id=<?= $x['id_anggaran'] ?>" type="submit" class="btn btn-warning">Ubah</a><br><br>
                        <a href="<?= base_url('admin/hapus_anggaran') ?>?id=<?= $x['id_anggaran'] ?>" type="submit" class="btn btn-danger tombol-hapus">Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <a class="btn btn-primary" href="<?= base_url('admin/tambah_anggaran'); ?>">Tambah Anggaran</a>
        <a class="btn btn-primary" href="<?= base_url('admin/lihat_anggaran'); ?>">Lihat Anggaran</a>
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>