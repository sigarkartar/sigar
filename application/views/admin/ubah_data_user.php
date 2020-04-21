<div class="content">
    <div class="container-fluid">
        <h2>Ubah Data User</h2>
        <?= $this->session->flashdata('message'); ?>
        <?php
        $id = $this->input->get('id');
        $user = $this->db->get_where('user', ['id_user' => $id])->row_array();
        ?>
        <form action="<?= base_url('admin/ubah_data_user') ?>" method="post">
            <input type="hidden" name="id" value="<?= $user['id_user'] ?>">
            <div class="form-group">
                <input required type="text" class="form-control form-control-user" name="nama" value="<?= $user['nama'] ?>">
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <input required type="text" class="form-control form-control-user" name="username" value="<?= $user['username'] ?>">
                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <input required type="password" class="form-control form-control-user" id="password1" name="password1" aria-describedby="emailHelp" placeholder="Password Baru">
                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <input required type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Konfirmasi Password Baru">
                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Ubah Data
            </button>
        </form>
    </div>
</div>