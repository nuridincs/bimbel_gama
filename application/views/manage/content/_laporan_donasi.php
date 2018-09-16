<div id="ui-view">
   <div>
      <link href="<?= base_url('assets/') ?>vendor/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
      <div class="animated fadeIn">
         <div class="card">
            <div class="card-header">
               <i class="fa fa-edit"></i> Laporan Donasi
               <div class="card-header-actions">
                  <a href="https://datatables.net" class="card-header-action" target="_blank">
                  <!-- <small class="text-muted">docs</small> -->
                  </a>
               </div>
            </div>
            <div class="card-body">
                <div style="padding: 0px 60px;">
                    <a href="<?= base_url('manage/export/donasi'); ?>" target="_blank" class="btn btn-primary btn-sm">Cetak Data</a>
                    <a href="<?= base_url('manage/kirimEmailDonatur'); ?>" class="btn btn-danger btn-sm">Kirim Data</a>
                </div>
                <br>
               <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                  <div class="row">
                     <div class="col-sm-12">
                        <table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                           <thead>
                              <tr role="row">
                                 <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 202px;">Nama Kegiatan</th>
                                 <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 170px;">Target Donasi</th>
                                 <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 170px;">Total Donasi Masuk</th>
                                 <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 68px;">Nama Bank</th>
                                 <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 82px;">Keterangan</th>
                                 <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 82px;">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php 
                                foreach($result as $value){ 
                                    $kekurangan_dana = $value['target_dana'] - $value['total_terkumpul'];
                            ?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><?= $value['nama_kegiatan'] ?></td>
                                    <td><?= "Rp. " . number_format($value['target_dana'],0,',','.') ?></td>
                                    <td><?= "Rp. " . number_format($value['total_terkumpul'],0,',','.') ?></td>
                                    <td><?= $value['nama_bank'] ?></td>
                                    <td>
                                    <?= $value['keterangan']; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="<?= base_url('manage/action/update/keterangan/').base64_encode($value['id']); ?>">
                                            <i class="fa fa-plus "></i>Tambah Keterangan
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                              </tr>
                           </tbody>
                        </table>
                        <!-- Modal -->
                        <div class="modal fade" id="modalDelKeg" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapaus data ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Hapus</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>