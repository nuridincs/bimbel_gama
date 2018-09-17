<div id="ui-view">
   <div>
      <link href="<?= base_url('assets/') ?>vendor/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
      <div class="animated fadeIn">
         <div class="card">
            <div class="card-header">
               <i class="fa fa-edit"></i> Data Jadwal
               <div class="card-header-actions">
                  <a href="https://datatables.net" class="card-header-action" target="_blank">
                  <!-- <small class="text-muted">docs</small> -->
                  </a>
               </div>
            </div>
            <div class="card-body">
                <div style="padding: 0px 60px;">
                    <a href="<?= base_url('manage/action/add/kegiatan'); ?>" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
                <br>
               <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                  <div class="row">
                     <div class="col-sm-12">
                        <table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                           <thead>
                              <tr role="row">
                                 <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 202px;">Nama Materi</th>
                                 <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 170px;">Nama Program</th>
                                 <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 68px;">Nama Instruktur</th>
                                 <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 82px;">Tgl. Belajar</th>
                                 <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 168px;">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                               <?php foreach($result as $value){ ?>
                              <tr role="row" class="odd">
                                 <td class="sorting_1"><?= $value['nama_kegiatan']; ?></td>
                                 <td><?= "Rp. " . number_format($value['target_dana'],0); ?></td>
                                 <td><?= $value['unix_id']; ?></td>
                                 <td>
                                    <?= $value['start_date']; ?>
                                 </td>
                                 <td>
                                    <a class="btn btn-info" href="<?= base_url('manage/action/update/kegiatan/').base64_encode($value['id']); ?>">
                                        <i class="fa fa-edit "></i>Ubah
                                    </a>
                                    <!-- <a class="btn btn-danger" href="<?//= base_url('manage/action/delete/kegiatan'); ?>">
                                        <i class="fa fa-trash-o "></i>Hapus
                                    </a> -->
                                    <a href="<?= base_url('manage/execute/delete/kegiatan/').$value['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash-o "></i>Hapus</a>
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