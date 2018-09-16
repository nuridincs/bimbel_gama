<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <?php 
                    $act = $this->uri->segment(3);
                ?>
            <strong><?php echo ucfirst($act); ?></strong> Kegiatan</div>
            <div class="card-body">
            <form class="form-horizontal" action="<?= base_url('manage/execute/'.$act.'/kegiatan/').($act == 'add' ? "" : $result[0]['id']); ?>" method="post" enctype="multipart/form-data">
                
                <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Nama Kegiatan</label>
                <div class="col-md-9">
                    <input class="form-control" id="nama_kegiatan" type="text" name="nama_kegiatan" required placeholder="Masukan Nama Kegiatan" value="<?= isset($result[0]['nama_kegiatan']) ? $result[0]['nama_kegiatan'] : "" ?>">
                    <!-- <span class="help-block">This is a help text</span> -->
                </div>
                </div>
                <div class="form-group row">
                <label class="col-md-3 col-form-label" for="email-input">Deskripsi</label>
                <div class="col-md-9">
                    <textarea name="deskripsi" class="form-control" id="deskripsi" cols="100" rows="10"><?= isset($result[0]['deskripsi']) ? $result[0]['deskripsi'] : "" ?></textarea>
                    <!-- <input class="form-control" id="deskripsi" type="text" name="deskripsi" required placeholder="Masukan Deskripsi"> -->
                    <!-- <span class="help-block">Please enter your email</span> -->
                </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Target Dana</label>
                    <div class="col-md-9">
                        <input class="form-control" id="target_dana" type="text" name="target_dana" required placeholder="Masukan Target Dana" value="<?= isset($result[0]['target_dana']) ? $result[0]['target_dana'] : "" ?>">
                        <!-- <span class="help-block">Please enter a complex password</span> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Tanggal Mulai</label>
                    <div class="col-md-9">
                        <input class="form-control" id="start_date" type="text" name="start_date" required placeholder="ex. 2018-01-01"  value="<?= isset($result[0]['start_date']) ? $result[0]['start_date'] : "" ?>">
                        <!-- <span class="help-block">Please enter a complex password</span> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Tanggal Berakhir</label>
                    <div class="col-md-9">
                        <input class="form-control" id="end_date" type="text" name="end_date" required placeholder="ex. 2018-01-01"  value="<?= isset($result[0]['end_date']) ? $result[0]['end_date'] : "" ?>">
                        <!-- <span class="help-block">Please enter a complex password</span> -->
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
                <div class="form-group row" <?= $display ?>>
                    <label class="col-md-3 col-form-label" for="file-input">Image</label>
                    <div class="col-md-9">
                        <input id="img" type="file" name="file_input">
                    </div>
                </div>
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