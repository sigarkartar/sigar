<div class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?= $this->session->flashdata('button'); ?>
        <table class="table table-bordered" style="text-align: center">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jawaban</th>
                <th></th>
            </tr>
            <?php
            $no = 1;
            foreach ($jawaban as $x) {
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $x['nama_balasan']; ?></td>
                    <td><?php echo $x['jawaban']; ?></td>
                    <td>
                        <a href="<?= base_url('admin/ubah_jawaban') ?>?id=<?= $x['id_balasan'] ?>" type="submit" class="btn btn-warning">Ubah</a><br><br>
                        <a href="<?= base_url('admin/hapus_jawaban') ?>?id=<?= $x['id_balasan'] ?>" type="submit" class="btn btn-danger tombol-hapus">Hapus</a>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </table>
        <a class="btn btn-primary" href="<?= base_url('admin/tambah_jawaban'); ?>?id=<?= $id['id_forum'] ?>">Tambah Jawaban</a>
    </div>
</div>