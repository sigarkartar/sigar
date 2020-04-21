<div class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?= $this->session->flashdata('button'); ?>
        <table class="table table-bordered" style="text-align: center">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
                <th></th>
            </tr>
            <?php
            $no = 1;
            foreach ($user as $x) {
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $x['nama']; ?></td>
                    <td><?php echo $x['pertanyaan']; ?></td>
                    <td>
                        <a href="<?= base_url('admin/jawaban') ?>?id=<?= $x['id_forum'] ?>" class="btn btn-outline-success">Lihat Jawaban</a>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/ubah_forum') ?>?id=<?= $x['id_forum'] ?>" type="submit" class="btn btn-warning">Ubah</a><br><br>
                        <a href="<?= base_url('admin/hapus_forum') ?>?id=<?= $x['id_forum'] ?>" type="submit" class="btn btn-danger tombol-hapus">Hapus</a>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </table>
        <a class="btn btn-primary" href="<?= base_url('admin/tambah_forum'); ?>">Tambah Forum</a>
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>