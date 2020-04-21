<div class="content">
    <div class="container-fluid">
        <h2>Ganti Password</h2>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('admin/password') ?>" method="post">
            <div class="form-group">
                <input type="password" class="form-control form-control-user" id="passwordlama" name="passwordlama" placeholder="Password Lama">
                <?= form_error('passwordlama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user" id="password1" name="password1" aria-describedby="emailHelp" placeholder="Password Baru">
                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Konfirmasi Password Baru">
                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Ganti
            </button>
        </form>
    </div>
</div>