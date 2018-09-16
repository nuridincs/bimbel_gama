<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <?php 
                    $act = $this->uri->segment(3);
                ?>
            <strong><?php echo ucfirst($act); ?></strong> User</div>
            <div class="card-body">
            <form class="form-horizontal" action="<?= base_url('manage/execute/'.$act.'/user/').($act == 'add' ? "" : $result[0]['id']); ?>" method="post">
                
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="text-input">Nama Lengkap</label>
                    <div class="col-md-9">
                        <input class="form-control" id="nama_lengkap" type="text" name="nama_lengkap" required placeholder="Masukan Nama Lengkap" value="<?= isset($result[0]['fullname']) ? $result[0]['fullname'] : "" ?>">
                        <!-- <span class="help-block">This is a help text</span> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Email</label>
                    <div class="col-md-9">
                        <input class="form-control" id="email" type="text" name="email" required placeholder="example@example.com"  value="<?= isset($result[0]['email']) ? $result[0]['email'] : "" ?>">
                        <!-- <span class="help-block">Please enter a complex password</span> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Password</label>
                    <div class="col-md-9">
                        <input class="form-control" id="password" type="password" name="password" required placeholder="Masukan Password" value="<?= isset($result[0]['password']) ? $result[0]['password'] : "" ?>">
                        <!-- <span class="help-block">Please enter a complex password</span> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">No. Telpon</label>
                    <div class="col-md-9">
                        <input class="form-control" id="no_telpon" type="text" name="no_telpon" required placeholder="0819xxxxxxxx"  value="<?= isset($result[0]['no_telpon']) ? $result[0]['no_telpon'] : "" ?>">
                        <!-- <span class="help-block">Please enter a complex password</span> -->
                    </div>
                </div>
                    <?php
                        if($act == 'update'){
                            $btn = "Ubah";
                            $display = "style='display:none'";
                        }else{
                            $btn = "Simpan";
                            $display = "style='display:none'";
                        }
                        // echo $btn;
                    ?>
                <div class="form-group row" <?= $display ?>>
                    <label class="col-md-3 col-form-label" for="file-input">Role</label>
                    <div class="col-md-9">
                        <input id="role" type="text" name="role" value="1">
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