<section id="download" class="download-section content-section text-center">
      <div class="container">
    <div>
        <div class="container container--medium">
            <h2 class="text-32 align-center no-margin-bottom">
              <span class="text-semibold">Platform Donasi Online terpercaya</span>
            </h2>
            <p class="align-center text--larger">
              Banyak orang yang sudah  berdonasi Online
             </p>
            </div>
      </div>
        <div class="row">
          <?php if(count($row) > 0 ){?>
        <?php foreach($row as $value){ ?>
          <a href="<?= base_url('site/action/detail/donasi/').base64_encode($value['id']); ?>" style="text-decoration: none;">
            <div class="col-sm-4" style="margin-bottom: 20px;">
              <div class="thumbnail content-items">
                  <img src="<?= base_url('assets/upload/').$value['image']; ?>" class="content-img" alt="ALT NAME">
                  <div class="caption">
                    <p align="left" style="margin: 10px;padding: 10px;height: 75px;">
                      <?= $value['nama_kegiatan'] ?> 
                    </p>
                    <p align="center">
                      <a href="<?= base_url('site/action/detail/donasi/').base64_encode($value['id']); ?>" class="btn btn-primary btn-donasi btn-block">Donasi</a>
                    </p>
                  </div>
                </div>
            </div>
          </a>
        <?php } ?>
        <?php }else{ ?>
            <h1>Data Donasi untuk sementara belum tersedia</h1>
        <?php } ?>
        </div>
        <br><br>
        <div align="center">
          <a href="<?= base_url('site/allDonasi'); ?>" class="btn btn-danger btn-block"> Lihat Semua</a>
        </div>
      </div>
    </section>