<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card o-hidden border-0 shadow-lg my-5" style="margin: 100px auto">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="<?= base_url('assets/img/katar.jpg') ?>" alt="" width="180" style="margin-bottom: 20px">
                                    <h5>KARANG TARUNA RT 01</h5>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?= base_url('auth') ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="username" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block" style="width: 30%; display:block; margin:auto">
                                        Login
                                    </button>
                                </form>
                                <!-- <div class="text-center">
                                    <a class="small" href="<?= base_url(); ?>auth/registration">Create an Account!</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>