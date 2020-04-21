<div class="content">
    <div class="container-fluid">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/') . $user['image'] ?>" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body" style="margin: 50px auto">
                        <h5 class="card-title">Nama &nbsp;&nbsp;: <?= $user['nama'] ?></h5>
                        <p class="card-text">Username : <?= $user['username'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>