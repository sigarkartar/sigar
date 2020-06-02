<div class="content" style="margin-top: 10%">
    <div class="container">
        <?= $this->session->flashdata('message'); ?>
        <h3 class="text-center">Kirim Aspirasi</h3><br>
        <form action="<?= base_url('user/aspirasi') ?>" method="post">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label>Aspirasi</label>
                <input type="text" class="form-control" name="aspirasi" required>
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