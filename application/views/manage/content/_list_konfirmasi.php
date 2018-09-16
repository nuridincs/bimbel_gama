<div id="ui-view">
   <div>
      <link href="<?= base_url('assets/') ?>vendor/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
      <div class="animated fadeIn">
         <div class="card">
            <div class="card-header">
               <i class="fa fa-edit"></i> Data Konfirmasi
               <div class="card-header-actions">
                  <a href="https://datatables.net" class="card-header-action" target="_blank">
                  <!-- <small class="text-muted">docs</small> -->
                  </a>
               </div>
            </div>
            <div class="card-body">
               <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                  <div class="row">
                     <div class="col-sm-12">
                        <table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                           <thead>
                              <tr role="row">
                                 <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 202px;">Nama Kegiatan</th>
                                 <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 170px;">Jumlah Donasi</th>
                                 <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 68px;">Bank Transfer</th>
                                 <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 82px;">Status</th>
                                 <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 168px;">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                               <?php foreach($result as $value){ ?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><?= $value['nama_kegiatan']; ?></td>
                                    <td><?=  "Rp. " . number_format($value['jumlah_donasi'],0,',','.') ?></td>
                                    <td><?= $value['nama_bank']; ?></td>
                                    <td>
                                        
                                        <?= (isset($value['bukti_donasi']) ? "<span class='badge badge-success'>Sudah Konfirmasi</span>" : "<span class='badge badge-danger'>Belum Konfirmasi</span>" ) ?>
                                        
                                    </td>
                                    <td>
                                        <?php $cekDonasi = (isset($value['bukti_donasi']) ? "style='pointer-events: none'" : "" ) ?>
                                    
                                        <a class="btn btn-info" <?= $cekDonasi ?> href="<?= base_url('manage/action/update/konfirmasi/').$value['id']; ?>">
                                            <i class="fa fa-edit "></i>Konfirmasi
                                        </a>
                                    </td>
                                </tr>
                               <?php } ?>
                           </tbody>
                        </table>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>