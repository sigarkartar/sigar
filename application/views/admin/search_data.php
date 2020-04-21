<div class="content">
    <div class="container-fluid">
        <table class="table table-bordered" style="text-align: center">
            <tr>
                <th>No</th>
                <th>ID Pel</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Keterangan</th>
                <th>Geser Meter</th>
                <th>Tanggal Bayar</th>
                <th>Biaya</th>
                <th>Dokumentasi</th>
                <th></th>
            </tr>
            <?php
            $no = 1;
            foreach ($search as $x) {
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $x['id_pelanggan']; ?></td>
                    <td><?php echo $x['nama']; ?></td>
                    <td><?php echo $x['alamat']; ?></td>
                    <td><?php echo $x['keterangan']; ?></td>
                    <td><?php echo $x['pk_geser_meter']; ?></td>
                    <td><?php echo $x['tanggal_pembayaran']; ?></td>
                    <td>Rp. <?php echo number_format($x['biaya']); ?></td>
                    <td><img src="<?= base_url('assets/img/') ?><?php echo $x['dokumentasi']; ?>" width="80" alt=""></td>
                    <td>
                        <a href="<?= base_url('admin/ubah_data') ?>?id=<?= $x['id_data'] ?>" type="submit" class="btn btn-warning">Ubah</a><br><br>
                        <a href="<?= base_url('admin/hapus_data') ?>?id=<?= $x['id_data'] ?>" type="submit" class="btn btn-danger tombol-hapus">Hapus</a>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </table>
        <!-- <a class="btn btn-primary" href="<?= base_url('admin/tambah_data'); ?>">Tambah Data</a> -->
    </div>
</div>