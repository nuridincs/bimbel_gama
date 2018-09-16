<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <?php 
                    $act = $this->uri->segment(3);
                ?>
            <strong><?php echo ucfirst($act); ?></strong> Bank</div>
            <div class="card-body">
            <form class="form-horizontal" action="<?= base_url('manage/execute/'.$act.'/bank/').($act == 'add' ? "" : $result[0]['id']); ?>" method="post" enctype="multipart/form-data">
                
                <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Nama Pemilik</label>
                <div class="col-md-9">
                    <input class="form-control" id="nama_pemilik" type="text" name="nama_pemilik" required placeholder="Masukan Nama Pemilik" value="<?= isset($result[0]['nama_pemilik']) ? $result[0]['nama_pemilik'] : "" ?>">
                    <!-- <span class="help-block">This is a help text</span> -->
                </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Nama Bank</label>
                    <div class="col-md-9">
                        <input class="form-control" id="nama_bank" type="text" name="nama_bank" required placeholder="Masukan Nama Bank" value="<?= isset($result[0]['nama_bank']) ? $result[0]['nama_bank'] : "" ?>">
                        <!-- <span class="help-block">Please enter a complex password</span> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">No. Rekening</label>
                    <div class="col-md-9">
                        <input class="form-control" id="no_rekening" type="text" name="no_rekening" required placeholder="ex. 32242342"  value="<?= isset($result[0]['no_rekening']) ? $result[0]['no_rekening'] : "" ?>">
                        <!-- <span class="help-block">Please enter a complex password</span> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Kode Bank</label>
                    <div class="col-md-9">
                        <input class="form-control" id="id_bank" type="text" name="id_bank" required placeholder="Masukan Kode Bank"  value="<?= isset($result[0]['cabang']) ? $result[0]['cabang'] : "" ?>">
                        <!-- <span class="help-block">Please enter a complex password</span> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Cabang</label>
                    <div class="col-md-9">
                        <input class="form-control" id="cabang" type="text" name="cabang" required placeholder="Masukan Nama Cabang"  value="<?= isset($result[0]['cabang']) ? $result[0]['cabang'] : "" ?>">
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
                    <label class="col-md-3 col-form-label" for="file-input">Logo Bank</label>
                    <div class="col-md-9">
                        <input id="img" type="file" name="file_input">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="file-input">Status</label>
                    <div class="col-md-9">
                        <select name="status" id="" class="form-control">
                            <option value="1">Publish</option>
                            <option value="0">Tidak Publish</option>
                        </select>
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