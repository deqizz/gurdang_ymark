<div class="panel panel-default">
    <div class="panel-heading" style="overflow: hidden">
        List Data <?php echo $title; ?> 
    </div>
    
    <!-- /.panel-heading -->
    <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode catatan BM</th>
                    <th>Nama Barang</th>
                    <th>Harga satuan</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>NIP Bag Keuangan</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($catatan_bm as $key => $value) {
                ?>
                    <tr idx="<?=$value['kode_catatan_bm'];?>" id="<?=$value['kode_catatan_bm'];?>">
                        <td><?=$key+1;?></td>
                        <td><?=$value['kode_catatan_bm'];?></td>
                        <td><?=$value['nama_brg'];?></td>
                        <td><?=$value['harga'];?></td>
                        <td><?=$value['jml_bm'];?></td>
                        <td><?=$value['tgl'];?></td>
                        <td><?=$value['nip_bag_keuangan'];?></td>
                        <td>
                          <?php 
                            if($value['status']==0){
                              echo"<div class='label label-danger'>Non active</div>";  
                            }else{
                              echo"<div class='label label-success'>Active</div>";  
                              
                            }
                            ?>
                        </td>
                        <td> 
                            <a data-target="#modal-admin-edit" data-backdrop="static" data-toggle="modal" class="update btn btn-sm btn-white text-black"><i class="fa fa-pencil-square-o fa-lg"></i></a>        
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        
    </div>
    <div id="modal-admin-edit" class="modal fade" role="dialog" style="display:none">
      <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close close-modal">&times;</button>
            <h4 class="modal-title"><?php echo $title; ?> Form<br>
        <small>Tambah, Ubah dan hapus <?php echo $title; ?></small>
      </h4>
          </div>
          <div class="modal-body">
            <form name="form-<?php echo $title; ?>" id="myForm-edit" method="POST" class=" form-horizontal">
            <div class="row">
             <input type="hidden" class="form-control" maxlength="50" required name="kode_catatan_bm" placeholder="Kode catatan BM">
             <input type="hidden" class="form-control" maxlength="50" required name="jml_bm">
             <input type="hidden" class="form-control" maxlength="50" required name="kode_brg">
                   <div class="form-group required">
                  <label class="col-sm-3 control-label">Status</label>
                  <div class="col-sm-8">
                  <input type="checkbox" style="margin-top: 10px" name="status" checked>
                  </div>
                </div>             
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default close-modal">Close</button>
            <input type="button" class="btn btn-primary" value="Save" onclick="post_data_edit();"></button>
          </div>
          </form>
        </div>
    </div>
      </div>
    </div>
    <!-- /.panel-body -->
</div>


