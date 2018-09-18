<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <?php 
                    $act = $this->uri->segment(3);
                ?>
            <strong><?php echo ucfirst($act); ?></strong> Pendaftaran</div>
            <div class="card-body">
            <form class="form-horizontal" action="<?= base_url('site/execute/add/pendaftaran/').($act == 'add' ? "" : @$result[0]['id']); ?>" method="post" enctype="multipart/form-data">
                
                <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Nama</label>
                <div class="col-md-9">
                    <input class="form-control" id="nama_lengkap" type="text" name="nama_lengkap" required placeholder="Masukan Nama" value="<?= isset($result[0]['fullnameema']) ? $result[0]['fullnameema'] : "" ?>">
                    <!-- <span class="help-block">This is a help text</span> -->
                </div>
                </div>
                <div class="form-group row">
                <label class="col-md-3 col-form-label" for="email-input">Alamat</label>
                <div class="col-md-9">
                    <textarea name="alamat" class="form-control" id="alamat" cols="100" rows="10"><?= isset($result[0]['alamat']) ? $result[0]['alamat'] : "" ?></textarea>
                    <!-- <input class="form-control" id="deskripsi" type="text" name="deskripsi" required placeholder="Masukan Deskripsi"> -->
                    <!-- <span class="help-block">Please enter your email</span> -->
                </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Tempat Lahir</label>
                    <div class="col-md-9">
                        <input class="form-control" id="tmpt_lahir" type="text" name="tmpt_lahir" required placeholder="Masukan Tempat Lahir" value="<?= isset($result[0]['tmpt_lahir']) ? $result[0]['tmpt_lahir'] : "" ?>">
                        <!-- <span class="help-block">Please enter a complex password</span> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Tanggal Lahir</label>
                    <div class="col-md-9">
                        <input class="form-control" id="tgl_lahir" type="text" name="tgl_lahir" required placeholder="Masukan tanggal lahir"  value="<?= isset($result[0]['tgl_lahir']) ? $result[0]['tgl_lahir'] : "" ?>">
                        <!-- <span class="help-block">Please enter a complex password</span> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Jenis Kelamin</label>
                    <div class="col-md-9">
                         <select name="jenis_kelamin" id="" class="form-control">
                            <option value="1">Laki-laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Sekolah</label>
                    <div class="col-md-9">
                        <input class="form-control" id="datepicker" type="text" name="sekolah" required placeholder="Masukan Nama Sekolah"  value="<?= isset($result[0]['sekolah']) ? $result[0]['sekolah'] : "" ?>">
                        <!-- <span class="help-block">Please enter a complex password</span> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">No. Telpon</label>
                    <div class="col-md-9">
                        <input class="form-control" id="datepicker" type="text" name="no_telpon" required placeholder="Masukan No. Telpon"  value="<?= isset($result[0]['no_telpon']) ? $result[0]['no_telpon'] : "" ?>">
                        <!-- <span class="help-block">Please enter a complex password</span> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Email/Email Orang Tua</label>
                    <div class="col-md-9">
                        <input class="form-control" id="datepicker" type="text" name="email" required placeholder="Masukan Email"  value="<?= isset($result[0]['email']) ? $result[0]['email'] : "" ?>">
                        <!-- <span class="help-block">Please enter a complex password</span> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Hari Bimbel</label>
                    <div class="col-md-9">
                        <select name="hari_bimbel" id="" class="form-control">
                            <option value="">Pilih Hari</option>
                            <option value="1">Senin</option>
                            <option value="2">Selasa</option>
                            <option value="3">Rabu</option>
                            <option value="4">Kamis</option>
                            <option value="5">Jumat </option>
                            <option value="6">Sabtu</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Materi Bimbel</label>
                    <div class="col-md-9">
                         <select name="id_materi" id="" class="form-control">
                            <option value="">--Pilih Nama Materi--</option>
                            <?php foreach ($data_materi as $value) { ?>
                                <option value="<?= $value['id'] ?>"><?= $value['nama_materi'] ?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Program Kelas</label>
                    <div class="col-md-9">
                        <select name="program_kelas" id="" class="form-control">
                            <option value="">Pilih Program</option>
                            <option value="Intensive">Intensive (SD 1-5,SMP 7-9,SMA 10-12)</option>
                            <option value="Private">Private (SD,SMP,SMA)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Waktu Bimbel</label>
                    <div class="col-md-9">
                        <input class="form-control" id="datepicker" type="text" name="waktu_bimbel" required placeholder="Masukan Waktu_bimbel"  value="<?= isset($result[0]['waktu_bimbel']) ? $result[0]['waktu_bimbel'] : "" ?>">
                        <!-- <span class="help-block">Please enter a complex password</span> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Tanggal Mulai Masuk</label>
                    <div class="col-md-9">
                        <input class="form-control" id="datepicker" type="text" name="tgl_masuk" required placeholder="Masukan tgl_masuk"  value="<?= isset($result[0]['tgl_masuk']) ? $result[0]['tgl_masuk'] : "" ?>">
                        <!-- <span class="help-block">Please enter a complex password</span> -->
                    </div>
                </div>
                <div class="form-group row">
                <label class="col-md-3 col-form-label" for="email-input">Keterangan</label>
                <div class="col-md-9">
                    <textarea name="keterangan" class="form-control" id="keterangan" cols="100" rows="10"><?= isset($result[0]['keterangan']) ? $result[0]['keterangan'] : "" ?></textarea>
                    <!-- <input class="form-control" id="deskripsi" type="text" name="deskripsi" required placeholder="Masukan Deskripsi"> -->
                    <!-- <span class="help-block">Please enter your email</span> -->
                </div>
                </div>
                    <?php
                        if($act == 'update'){
                            $btn = "Ubah";
                            $display = "style='display:none'";
                        }else{
                            $btn = "Simpan";
                            $display = "";
                        }
                        // echo $btn;
                    ?>
                <div class="card-footer" align="center">
                    <input class="btn btn-sm btn-primary" type="submit" value="<?= $btn ?>" style="width:50%">
                        <!-- <i class="fa fa-dot-circle-o"></i>  -->
                <!-- <button class="btn btn-sm btn-danger" type="reset">
                    <i class="fa fa-ban"></i> Reset</button> -->
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>