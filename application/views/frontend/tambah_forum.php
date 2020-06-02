<div class="content" style="margin-top: 10%">
    <div class="container">
        <?= $this->session->flashdata('message'); ?>
        <h3 class="text-center">Kirim Pertanyaan Di Forum</h3><br>
        <form action="<?= base_url('user/tambah_forum') ?>" method="post">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label>Pertanyaan</label>
                <input type="text" class="form-control" name="pertanyaan" required>
            </div>
            <?php
            $date = date('Y-m-d');
            ?>
            <input type="hidden" name="tanggal" value="<?= $date ?>">
            <button type="submit" class="btn btn-primary btn-user mt-5" style="margin:auto; display:block">
                Kirim
            </button>
        </form>
    </div>
</div>