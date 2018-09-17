<div class="animated fadeIn">
    <div class="row">
    	<?php if($this->session->userdata('status') == "login"){ ?>
        	<h1>Selamat datang <?= $this->session->userdata('nama'); ?> </h1>    
        <?php }else{ $this->load->view('manage/content/_home'); } ?>   
    </div>
<!-- /.row-->
</div>