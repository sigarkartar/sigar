  <!--/ Intro Skew Star /-->
  <div id="home" class="intro route bg-image" style="background-image: url('<?php echo base_url(); ?>assets_frontend/img/back-katar.jpg')">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <!--<p class="display-6 color-d">Hello, world!</p>-->
          <h1 class="intro-title mb-4">Karang Taruna</h1>
          <p class="intro-subtitle"><span class="text-slider-items">RT 01 RW 03 Kelurahan Wonokromo Kecamatan Wonokromo Kota Surabaya</span><strong class="text-slider"></strong></p>
          <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->
  <br />
  <br />
  <br />

  <section id="service" class="services-mf route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              KEPENGURUSAN
            </h3>
            <p class="subtitle-a">
              Pengurus Karang Taruna RT 01 RW 03
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <?php foreach ($pengurus as $x) : ?>
          <div class="col-md-4">
            <div class="service-box">
              <div class="service-ico">
                <img src="<?= base_url('assets/img/katar.jpg') ?>" class="mb-4" width="100" style="margin: auto; display:block" alt="">
              </div>
              <div class="service-content">
                <h2 class="text-center"><?= $x['nama'] ?></h2>
                <p class="s-description text-center">
                  <?= $x['jabatan'] ?>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <!--/ Section Services End /-->

  <div class="section-counter paralax-mf bg-image" style="background-image: url(img/counters-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-checkmark-round"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">12</p>
              <span class="counter-text">WORKS COMPLETED</span>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-6" style="display:block; margin: auto; text-align:center;">
          <div class="counter-ico">
            <span class="ico-circle"><i class="ion-paper-airplane" style="color: white;"></i></span>
          </div>
          <a href="<?= base_url('user/aspirasi') ?>" class="text-white btn btn-outline-primary mt-4 mb-5">KIRIM ASPIRASI</a>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ios-calendar-outline"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">4</p>
              <span class="counter-text">YEARS OF EXPERIENCE</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section id="work" class="portfolio-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              TRANSPARANSI ANGGARAN & JADWAL
            </h3>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4">
          <div class="work-box">
            <div class="work-content">
              <div class="row">
                <div class="col-sm-8">
                  <h2 class="w-title">Anggaran</h2>
                  <div class="w-more">
                    <a href="<?= base_url('user/anggaran') ?>">Lihat Anggaran</a>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="w-like">
                    <a href="<?= base_url('user/anggaran') ?>" class="ion-ios-eye"></a>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <div class="work-content">
              <div class="row">
                <div class="col-sm-8">
                  <h2 class="w-title">Jadwal</h2>
                  <div class="w-more">
                    <a href="<?= base_url('user/jadwal') ?>">Lihat Jadwal</a>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="w-like">
                    <a href="<?= base_url('user/jadwal') ?>" class="ion-ios-eye"></a>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!--/ Section Testimonials Star /-->
  <div class="testimonials paralax-mf bg-image" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="testimonial-mf" class="owl-carousel owl-theme">
            <div class="testimonial-box">
              <div class="author-test">
                <img src="<?= base_url('assets/img/4357.jpg') ?>" style="width: 30%" alt="" class="rounded-circle b-shadow-a">
                <span class="author">arfian</span>
              </div>
              <div class="content-test">
                <p class="description lead">
                  Karang Taruna merupakan wadah pembinaan dan pengembangan serta pemberdayaan dalam upaya mengembangkan kegiatan ekonomi produktif dengan pendayagunaan semua potensi yang tersedia di lingkungan baik sumber daya manusia maupun sumber daya alam yang telah ada. Sebagai organisasi kepemudaan, Karang Taruna berpedoman pada Pedoman Dasar dan Pedoman Rumah Tangga di mana telah pula diatur tentang struktur pengurus dan masa jabatan di masing-masing wilayah
                </p>
                <span class="comit"><i class="fa fa-quote-right"></i></span>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!--/ Section Blog Star /-->
  <section id="blog" class="blog-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              FORUM CHAT
            </h3>
            <p class="subtitle-a">
              Kegiatan karang taruna wonokromo
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="pertanyaan" style="text-align: center;">
        <a href="<?= base_url('user/tambah_forum') ?>" class="btn btn-primary mb-3">Tambah Forum</a>
        <table class="table table-bordered">
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Pertanyaan</th>
            <th>Lihat Jawaban</th>
          </tr>
          <?php
          foreach ($forum as $x) : ?>
            <tr>
              <td><?= ++$start; ?></td>
              <td><?= $x['tanggal'] ?></td>
              <td><?= $x['nama'] ?></td>
              <td><?= $x['pertanyaan'] ?></td>
              <td><a href="<?= base_url('user/jawaban') ?>?id=<?= $x['id_forum'] ?>" class="btn btn-primary">Lihat</a></td>
            </tr>
          <?php endforeach ?>
        </table>
        <?= $this->pagination->create_links(); ?>
      </div>
    </div>
  </section>