<div id="ui-view">
   <div>
      <link href="<?= base_url('assets/') ?>vendor/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
      <div class="animated fadeIn">
         <div class="card">
            <div class="card-header">
               <i class="fa fa-edit"></i> Data User
               <div class="card-header-actions">
                  <a href="https://datatables.net" class="card-header-action" target="_blank">
                  <!-- <small class="text-muted">docs</small> -->
                  </a>
               </div>
            </div>
            <div class="card-body">
                <div style="padding: 0px 60px;">
                    <a href="<?= base_url('manage/action/add/bank'); ?>" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
                <br>
               <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                  <div class="row">
                     <div class="col-sm-12">
                        <table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                           <thead>
                              <tr role="row">
                                 <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 202px;">Nama Pemilik</th>
                                 <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 170px;">Nama Bank</th>
                                 <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 68px;">No. Rekening</th>
                                 <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 68px;">Status</th>
                                 <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 168px;">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                               <?php foreach($result as $value){ ?>
                              <tr role="row" class="odd">
                                 <td class="sorting_1"><?= $value['nama_pemilik']; ?></td>
                                 <td><?= $value['nama_bank']; ?></td>
                                 <td><?= $value['no_rekening']; ?></td>
                                 <td><?= ($value['status'] == 1 ? 'Publish' : 'Tidak Publish'); ?></td>
                                 <td>
                                    <a class="btn btn-info" href="<?= base_url('manage/action/update/bank/').base64_encode($value['id']); ?>">
                                        <i class="fa fa-edit "></i>Ubah
                                    </a>
                                    <a href="<?= base_url('manage/execute/delete/bank/').$value['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash-o "></i>Hapus</a>
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