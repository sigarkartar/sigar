<div class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <h4>Welcome <?= $user['nama'] ?>!</h4>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">notifications</i>
                        </div>
                        <p class="card-category">Jumlah</p>
                        <?php $count = $this->db->count_all('aspirasi'); ?>
                        <h3 class="card-title"><?= $count; ?>
                            <small>Aspirasi Warga</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="<?= base_url('admin/aspirasi') ?>">Lihat Data</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">content_paste</i>
                        </div>
                        <p class="card-category">Jumlah</p>
                        <h3 class="card-title"><?= $this->db->count_all('jadwal') ?><br>
                            <small>Jadwal</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="<?= base_url('admin/jadwal') ?>">Lihat Data</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <p class="card-category">Jumlah</p>
                        <h3 class="card-title"><?= $this->db->count_all('forum') ?><br>
                            <small>Forum</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="<?= base_url('admin/forum') ?>">Lihat Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>