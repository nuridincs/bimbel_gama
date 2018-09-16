<!-- Bootstrap core CSS -->
<link href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<title>Donasi Sekarang</title>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">donasipay</a>
    </li>
    <li class="nav-item" style="margin-left: 900px;">
      <a class="nav-link" href="/">Donasi</a>
    </li>
    <!--s<li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li> -->
  </ul>
</nav>

<div class="container">
   <div class="row">
    <?php //echo "<pre>";print_r($row); ?>
      <!-- Blog Entries Column -->
      <div class="col-md-8">
         <!-- <h1 class="my-4">Page Heading -->
            <h1><?= $row[0]['nama_kegiatan']; ?></h1>
         <!-- </h1> -->
         <!-- Blog Post -->
         <div class="card mb-4">
            <img class="card-img-top" src="<?= base_url('assets/upload/').$row[0]['image']; ?>" alt="Card image cap">
            <div class="card-body">
               <!-- <h2 class="card-title">Post Title</h2> -->
               <p class="card-text"><?= $row[0]['deskripsi']; ?></p>
               <!-- <a href="#" class="btn btn-primary">Read More →</a> -->
            </div>
            <!-- <div class="card-footer text-muted">
               Posted on January 1, 2017 by
               <a href="#">Start Bootstrap</a>
            </div> -->
         </div>
      </div>
      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
         <!-- Side Widget -->
         <div class="card my-4" style="top: 35px;">
            <h5 class="card-header">Donasi Sekarang</h5>
            <div class="card-body">
                <form action="<?= base_url('site/action/execute/donasi'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap:</label>
                        <input type="text" class="form-control" required name="nama_lengkap">
                        <input type="hidden" class="form-control" required name="id_kegiatan" value="<?= $row[0]['id']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">No Telepon</label>
                        <input type="text" class="form-control" required name="no_telpon">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" required name="email">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_donasi">Jumlah Donasi:</label>
                        <input type="text" class="form-control" required name="jumlah_donasi">
                        <input type="hidden" class="form-control" required name="unix_id" value="<?= $row[0]['unix_id']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="bank">Pilih Bank Transfer:</label>
                        <!-- <input type="text" class="form-control" required name="bank"> -->
                        <select name="bank" id="bank" class="form-control">
                            <?php foreach($bank as $row){ ?>
                                <option value="<?= $row['id'] ?>"><?= $row['nama_bank'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label for="doa">Dukungan/Doa:</label>
                        <textarea name="doa" class="form-control" required name="doa" cols="35" rows="5"></textarea>
                    </div> -->
                    <input type="submit" class="btn btn-danger" value="Donasi" style="width:100%">
                </form>
            </div>
         </div>
      </div>
   </div>
   <!-- /.row -->
</div>
