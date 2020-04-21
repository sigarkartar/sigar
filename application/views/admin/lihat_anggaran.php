<div class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?= $this->session->flashdata('button'); ?>
        <table class="table table-bordered" style="text-align: center">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Ket</th>
                <th>Pemasukan</th>
                <th>Pengeluaran</th>
                <th>Total</th>
            </tr>
            <?php
            $no = 1;
            $total = 0;
            foreach ($user as $x) {
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $x['tanggal_anggaran']; ?></td>
                    <td><?php echo $x['keterangan']; ?></td>
                    <td><?php if ($x['jenis_anggaran'] == "pemasukan") {
                            echo "Rp " . number_format($x['jumlah']);
                            $total = $total + $x['jumlah'];
                        } ?></td>
                    <td><?php if ($x['jenis_anggaran'] == "pengeluaran") {
                            echo "Rp " . number_format($x['jumlah']);
                            $total = $total - $x['jumlah'];
                        } ?></td>
                    <td>Rp. <?php echo number_format($total); ?></td>
                </tr>
            <?php
                $no++;
            }
            ?>
            <tr class="font-weight-bold" style="color: red">
                <td colspan="5">Total</td>
                <td>Rp. <?= number_format($total) ?></td>
            </tr>
        </table>
    </div>
</div>