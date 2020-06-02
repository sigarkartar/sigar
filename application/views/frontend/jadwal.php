<div class="content" style="margin-top: 10%">
    <div class="container">
        <table class="table table-bordered" style="text-align: center">
            <tr>
                <th>No</th>
                <th>Nama Kegiatan</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
            </tr>
            <?php
            $no = 1;
            foreach ($jadwal as $x) {
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $x['nama_jadwal']; ?></td>
                    <td><?php echo $x['tanggal_jadwal']; ?></td>
                    <td><?php echo $x['deskripsi']; ?></td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </table>
    </div>
</div>