<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <?php 
                    $act = $this->uri->segment(3);
                ?>
            <strong><?php echo ucfirst($act); ?></strong> Jadwal</div>
            <div class="card-body">
            <form class="form-horizontal" action="<?= base_url('site/execute/'.$act.'/jadwal/').($act == 'add' ? "" : @$result[0]['id']); ?>" method="post" enctype="multipart/form-data">
                
                <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Nama Materi</label>
                    <div class="col-md-9">
                        <select name="materi" id="" class="form-control">
                            <option value="">--Pilih Nama Materi--</option>
                            <?php foreach ($data_materi as $value) { ?>
                                <option value="<?= $value['id'] ?>" <?= $result[0]['id_materi'] == $value['id'] ? ' selected="selected"' : '';?>><?= $value['nama_materi'] ?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Nama Instruktur</label>
                    <div class="col-md-9">
                        <select name="nama_instruktur" id="" class="form-control">
                            <option value="">--Pilih Nama Instruktur--</option>
                            <?php foreach ($data_instruktur as $value) { ?>
                                <option value="<?= $value['id'] ?>" <?= $result[0]['id_instruktur'] == $value['id'] ? ' selected="selected"' : '';?>><?= $value['nama_instruktur'] ?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Hari Mengajar</label>
                    <div class="col-md-9">
                        <select name="hari" id="" class="form-control">
                            <option value="<?= $result[0]['hari'] ?>"><?= $result[0]['hari'] ?></option>
                            <option value="">--Pilih Hari--</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Tanggal Belajar</label>
                    <div class="col-md-9">
                        <input class="form-control" id="tgl_belajar" type="text" name="tgl_belajar" required placeholder="Masukan tanggal belajar"  value="<?= isset($result[0]['tanggal']) ? $result[0]['tanggal'] : "" ?>">
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