<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <?php 
                    $act = $this->uri->segment(3);
                    $id = $this->uri->segment(5);
                ?>
            <strong><?php echo ucfirst($act); ?></strong> Konfirmasi</div>
            <div class="card-body">
            <form class="form-horizontal" action="<?= base_url('manage/execute/'.$act.'/konfirmasi/').($act == 'add' ? "" : $id); ?>" method="post" enctype="multipart/form-data">
               
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Bukti Transfer</label>
                    <div class="col-md-9">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <input type="file" name="bukti_transfer">                        
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