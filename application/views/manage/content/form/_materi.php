<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <?php 
                    $act = $this->uri->segment(3);
                ?>
            <strong><?php echo ucfirst($act); ?></strong> Materi</div>
            <div class="card-body">
            <form class="form-horizontal" action="<?= base_url('site/execute/'.$act.'/materi/').($act == 'add' ? "" : @$result[0]['id']); ?>" method="post" enctype="multipart/form-data">
                
                <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Nama Materi</label>
                <div class="col-md-9">
                    <input class="form-control" id="nama_materi" type="text" name="nama_materi" required placeholder="Masukan Nama Materi" value="<?= isset($result[0]['nama_materi']) ? $result[0]['nama_materi'] : "" ?>">
                </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Nama Instruktur</label>
                    <div class="col-md-9">
                        <select name="nama_instruktur" id="" class="form-control">
                            <option value="">--Pilih Nama Instruktur--</option>
                            <?php foreach ($data_instruktur as $value) { ?>
                                <option value="<?= $value['id'] ?>" <?php 
                                        if($result[0]['id_instruktur'] == $value['id']){ 
                                            echo 'selected="selected"';
                                        } else{
                                            echo "";
                                        }
                                    ?>
                                ><?= $value['nama_instruktur'] ?> 

                                </option>
                            <?php } ?>
                            
                        </select>
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