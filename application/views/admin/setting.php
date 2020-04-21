<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Profile</h4>
                        <p class="card-category">Complete your profile</p>
                    </div><br>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body mt-2">
                        <form action="<?= base_url('admin/setting') ?>" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Username</label>
                                        <input type="text" readonly name="username" class="form-control" value="<?= $user['username'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name</label>
                                        <input type="text" name="nama" class="form-control" value="<?= $user['nama'] ?>">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <img class="img" src="<?= base_url('/assets/img/') . $user['image'] ?>" />
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">Administrator</h6>
                        <h4 class="card-title"><?= $user['nama'] ?></h4>
                        <p class="card-description"><?= $user['username'] ?></p>
                        <a href="<?= base_url('admin/password') ?>" class="btn btn-primary btn-round">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>