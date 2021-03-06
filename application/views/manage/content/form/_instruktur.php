<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <?php 
                    $act = $this->uri->segment(3);
                ?>
            <strong><?php echo ucfirst($act); ?></strong> Instruktur</div>
            <div class="card-body">
            <form class="form-horizontal" action="<?= base_url('site/execute/'.$act.'/instruktur/').($act == 'add' ? "" : @$result[0]['id']); ?>" method="post" enctype="multipart/form-data">
                
                <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Nama Instruktur</label>
                <div class="col-md-9">
                    <input class="form-control" id="nama_instruktur" type="text" name="nama_instruktur" required placeholder="Masukan Nama Instruktur" value="<?= isset($result[0]['nama_instruktur']) ? $result[0]['nama_instruktur'] : "" ?>">
                    <!-- <span class="help-block">This is a help text</span> -->
                </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Email</label>
                    <div class="col-md-9">
                        <input class="form-control" id="email" type="email" name="email" required placeholder="Masukan Email" value="<?= isset($result[0]['email']) ? $result[0]['email'] : "" ?>">
                        <!-- <span class="help-block">Please enter a complex password</span> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">No. Telpon</label>
                    <div class="col-md-9">
                        <input class="form-control" id="no_telpon" type="text" name="no_telpon" required placeholder="No. Telpon"  value="<?= isset($result[0]['no_telpon']) ? $result[0]['no_telpon'] : "" ?>">
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