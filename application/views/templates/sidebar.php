<div class="sidebar" data-color="purple" data-background-color="white" data-image="<?= base_url('/assets/admin/img/sidebar-1.jpg') ?>">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo"><a href="<?= base_url('admin') ?>" class="simple-text logo-normal">
            KARANG TARUNA RT 01
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <?php
            if ($url == base_url('admin') || $url == base_url('admin/profile') || $url == base_url('admin/setting')) {
            ?>
                <li class="nav-item active ">
                <?php
            } else {
                ?>
                <li class="nav-item ">
                <?php
            }
                ?>
                <a class="nav-link" href="<?= base_url('admin') ?>">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
                </li>
                <?php
                if ($url == base_url('admin/user') || $url == base_url('admin/ubah_user') || $url == base_url('admin/tambah_user')) {
                ?>
                    <li class="nav-item active ">
                    <?php
                } else {
                    ?>
                    <li class="nav-item ">
                    <?php
                }
                    ?>
                    <a class="nav-link" href="<?= base_url('admin/user') ?>">
                        <i class="material-icons">person</i>
                        <p>User</p>
                    </a>
                    </li>
                    <?php
                    if ($url == base_url('admin/aspirasi') || $url == base_url('admin/tambah_aspirasi') || $url == base_url('admin/ubah_aspirasi')) {
                    ?>
                        <li class="nav-item active ">
                        <?php
                    } else {
                        ?>
                        <li class="nav-item ">
                        <?php
                    }
                        ?>
                        <a class="nav-link" href="<?= base_url('admin/aspirasi') ?>">
                            <i class="material-icons">notifications</i>
                            <p>Aspirasi Warga</p>
                        </a>
                        </li>
                        <?php
                        if ($url == base_url('admin/anggaran') || $url == base_url('admin/lihat_anggaran') || $url == base_url('admin/tambah_anggaran') || $url == base_url('admin/ubah_anggaran')) {
                        ?>
                            <li class="nav-item active ">
                            <?php
                        } else {
                            ?>
                            <li class="nav-item ">
                            <?php
                        }
                            ?>
                            <a class="nav-link" href="<?= base_url('admin/anggaran') ?>">
                                <i class="material-icons">money</i>
                                <p>Anggaran</p>
                            </a>
                            </li>
                            <?php
                            if ($url == base_url('admin/jadwal') || $url == base_url('admin/tambah_jadwal') || $url == base_url('admin/ubah_jadwal')) {
                            ?>
                                <li class="nav-item active ">
                                <?php
                            } else {
                                ?>
                                <li class="nav-item ">
                                <?php
                            }
                                ?>
                                <a class="nav-link" href="<?= base_url('admin/jadwal') ?>">
                                    <i class="material-icons">content_paste</i>
                                    <p>Jadwal</p>
                                </a>
                                </li>
                                </li>
                                <?php
                                if ($url == base_url('admin/forum') || $url == base_url('admin/tambah_forum') || $url == base_url('admin/ubah_forum') || $url == base_url('admin/jawaban') || $url == base_url('admin/tambah_jawaban') || $url == base_url('admin/ubah_jawaban')) {
                                ?>
                                    <li class="nav-item active ">
                                    <?php
                                } else {
                                    ?>
                                    <li class="nav-item ">
                                    <?php
                                }
                                    ?>
                                    <a class="nav-link" href="<?= base_url('admin/forum') ?>">
                                        <i class="material-icons">forum</i>
                                        <p>Forum</p>
                                    </a>
                                    </li>
        </ul>
    </div>
</div>