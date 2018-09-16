<title>Terima Kasih</title>
<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
<body id="site-body" class="">
   
   <header class="site-header site-header--alt">
      <div class="container">
         <a class="site-logo" href="/"><!--<img src="<?//= base_url('assets/img/pay-logo.png'); ?>" alt="">-->donasipay</a> 
         <div class="header-option">
            <div class="header-search-input">
               <!-- <form action="/search" method="GET">
                  <input type="text" class="header-search-drop" placeholder="Cari judul, nama, atau isi campaign" name="keyword" value="" autocomplete="off">
                  <span class="fa fa-search"></span>
               </form> -->
            </div>
            <div class="header-search-overlay sr-only"></div>
            <div class="header-side-nav">
               <div class="header-actions">
                  <div class="header-actions__items">
                     <div class="header-actions__item">
                        <a class="btn btn--ghost btn--mtrl header-actions__btn" href="/explore/all"><strong>Donasi</strong></a> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- <div class="header-actions__items header-actions__dropdown">
            <div class="header-actions__item">
               <a href="#" class="text-24" id="navbar-toggle">
               <span></span>
               </a>
               <ul class="list-nostyle header-actions__dropdown-list hidden">
                  <li>
                     <a onclick="ga('send', 'event', 'new-header-user_menu-register', 'click', 'new-header-user_menu-register');" href="/register">Daftar</a> 
                  </li>
                  <li>
                     <a onclick="ga('send', 'event', 'new-header-user_menu-login', 'click', 'new-header-user_menu-login');" href="/login/%252Fharauntuklombok%252Fcontribute%252Fsummary%252F1623984%252FnsS5Z2zwP0fJt7Nlr6jYK1hA3kIU8X9RbpyeLFvO">Masuk</a> 
                  </li>
                  <li>
                     <a onclick="ga('send', 'event', 'new-header-user_menu-faq', 'click', 'new-header-user_menu-faq');" href="/faq">Bantuan</a> 
                  </li>
               </ul>
            </div> -->
         </div>
      </div>
   </header>

   <main class="site-main" style="min-height: 428px;">
      <div class="load-overlay hidden">
         <img src="/elements/images/default.svg">
      </div>
      <div class="container">
         <div class="project-header--top">
            <div class="page-title project-title align-center large-margin-top">
               <h1 class="text-slim text-18 no-margin">
                  Anda akan berdonasi untuk <br>
               </h1>
               <h2 class="text-18 no-margin subtitle-margin-top">
               <?= $row[0]['nama_kegiatan'] ?>
               </h2>
            </div>
         </div>
         <div class="contribute-step">
            <div class="cols">
               <div class="main-col" style="max-width:565px">
                  <div class="white-box white-box--summary block">
                     <table class="table-block table--compact table-nominal">
                        <tbody>
                           <tr>
                              <td class="label-col label-col-text text-14">
                                 Jumlah Donasi 
                              </td>
                              <td class="col-rp text-14">
                                 Rp.
                              </td>
                              <td class="align-right col-number text-14">
                                 <?= number_format($row[0]['jumlah_donasi'],0,',','.') ?>
                              </td>
                           </tr>
                           <tr>
                              <td class="label-col label-col-text text-14">
                                 Kode Unik (akan didonasikan)
                              </td>
                              <td class="col-rp text-14">
                                 Rp.
                              </td>
                              <td class="align-right col-number text-14">
                              <?= $row[0]['unix_id'] ?> 
                              </td>
                           </tr>
                           <tr class="total-order">
                              <td class="label-col label-total">
                                 <h2 class="no-space text-20 text--medium">Total</h2>
                              </td>
                              <td class="col-rp label-total">
                                 <h2 class="no-space text-20 text--medium">Rp.</h2>
                              </td>
                              <td class="align-right col-number label-total">
                                 <h2 class="total-pay no-space text-20 text--medium">
                                    <?//= number_format($row[0]['jumlah_donasi'],2,',','.') ?>
                                    <div class="unique-code text-pink tooltip"><?= number_format($row[0]['total_donasi'],0,',','.') ?> </div>
                                 </h2>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                     <div class="tooltip tooltip__body tooltip__body--nominal text-semibold">
                        <div class="text-black70 material-icons tooltip__icon centered-inline">
                           info_outline
                        </div>
                        <div class="text-black70 text-12 tooltip__text centered-inline">
                           PENTING, transfer sampai 3 digit terakhir agar donasi Anda terverifikasi.
                        </div>
                     </div>
                     <div class="col">
                        <div class="col col--m5">
                           <h3 class="text-14 no-margin text-slim">
                              Silakan transfer ke
                           </h3>
                           <div class="bank-list">
                              <div class="bank-list__item">
                                 <div class="item-img">
                                    <img src="/assets/upload/bank/<?= $row[0]['logo_bank'] ?>" alt="">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col col--m7 no-margin-left">
                           <div class="bank-list">
                              <div class="bank-list__item">
                                 <div class="item-text">
                                    <h3 class="text-semibold no-margin">
                                        <?= $row[0]['no_rekening'] ?> <br>
                                    </h3>
                                    <p class="text-12 small-margin-tb">
                                       Atas nama: <?= $row[0]['no_rekening'] ?> <br>
                                    </p>
                                    <p class="text-12 small-margin-tb">
                                       Cabang: KCP <?= $row[0]['cabang'] ?><br>
                                    </p>
                                    <p class="text-12 small-margin-tb">
                                        <?= $row[0]['nama_bank'] ?> 
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <p class="text-14 base-margin-tb">
                        Anda dapat transfer menggunakan channel apapun (ATM, mobile banking, SMS banking, atau teller) selama tujuan transfer sesuai dengan bank yang dipilih.
                     </p>
                  </div>
                  <div class="white-box white-box--desc block">
                     <p class="text-14">
                        Jika sudah transfer harap konfirmasi melalui link berikut.
                        <div align="center">
                            <a href="<?php site_url() ?>/manage" class="btn btn-info">Konfirmasi</a>
                        </div>
                     </p>
                  </div>
                  <!-- <h3 class="align-center">
                     Campaign-campaign berikut juga butuh bantuanmu, lihat selengkapnya!
                  </h3>
                  <ul class="list-nostyle rec-list">
                     <li>
                        <a href="#"><img src="https://kitabisa-userupload-01.s3-ap-southeast-1.amazonaws.com/_production/campaign/71273/31_71273_1534830274_580426_s.png" alt=""></a> 
                        <div class="rec-list__content">
                           <h2 class="rec-list__title">
                              Bantu Anak Korban Gempa Lombok 
                           </h2>
                           <h3 class="rec-list__campaigner">
                              Oleh: Peduli Anak Foundation 
                           </h3>
                           <p>
                              “12 tahun membangun yayasan ini, namun semuanya hancur dalam beberapa menit” – Chaim, pendiri Yayasan Peduli Anak. 
                           </p>
                        </div>
                        <a class="rec-list__link" href="https://kitabisa.com/pedulianakgempa?utm_medium=campaign&amp;utm_source=payment-summary&amp;utm_campaign=recomended" onclick="ga('send', 'event', 'campaign-card', 'click', 'desktop.donate-summary');">
                        <span>
                        Donasi ke campaign ini
                        </span>
                        </a>
                     </li>
                     
                  </ul> -->
                  
               </div>
            </div>
         </div>
      </div>
   </main>

   <style></style>
</body>