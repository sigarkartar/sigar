<div class="content">
    <div class="container-fluid">
        <h2 class="mb-5">Tambah Data</h2>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('admin/tambah_user') ?>" method="post">
            <div class="form-group">
                <label>Role</label>
                <select name="role_id" class="form-control" required>
                    <option value="">Pilih Role</option>
                    <option value="1">Wakil</option>
                    <option value="2">Sekretaris</option>
                    <option value="3">Bendahara</option>
                    <option value="4">Anggota</option>
                </select>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password1" required>
            </div>
            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" class="form-control" name="password2" required>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Tambahkan
            </button>
        </form>
    </div>
</div>