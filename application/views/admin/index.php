<div class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <h4>Welcome <?= $user['nama'] ?>!</h4>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">content_copy</i>
                        </div>
                        <p class="card-category">Jumlah</p>
                        <?php $count = $this->db->count_all('aspirasi'); ?>
                        <h3 class="card-title"><?= $count; ?>
                            <small>Aspirasi Warga</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="<?= base_url('admin/data') ?>">Lihat Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>