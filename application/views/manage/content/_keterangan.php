<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <?php 
                    $act = $this->uri->segment(3);
                ?>
            <strong><?php echo ucfirst($act); ?></strong> Keterangan</div>
            <div class="card-body">
            <form class="form-horizontal" action="<?= base_url('manage/execute/'.$act.'/keterangan/').($act == 'add' ? "" : $id); ?>" method="post" enctype="multipart/form-data">
               
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Keterangan</label>
                    <div class="col-md-9">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <textarea name="keterangan" class="form-control" id="" cols="50" rows="10" placeholder="Masukan Keterangan"></textarea>
                    </div>
                </div>
                <div class="card-footer" align="center">
                    <input class="btn btn-sm btn-primary" type="submit" value="Submit" style="width:50%">
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>