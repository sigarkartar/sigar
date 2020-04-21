<div class="content">
    <div class="container-fluid">
        <h2 class="mb-5">Tambah Anggaran</h2>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('admin/tambah_anggaran') ?>" method="post">
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal" required>
            </div>
            <select name="jenis" class="form-control">
                <option value="">Pilih Jenis Anggaran</option>
                <option value="pemasukan">Pemasukan</option>
                <option value="pengeluaran">Pengeluaran</option>
            </select><br>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="jumlah" required>
            </div>
            <div class="form-group">
                <label>Ketereangan</label>
                <input type="text" class="form-control" name="keterangan" required>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Tambahkan
            </button>
        </form>
    </div>
</div>