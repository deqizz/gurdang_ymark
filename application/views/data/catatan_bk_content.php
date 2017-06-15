<div class="panel panel-default">
    <div class="panel-heading" style="overflow: hidden">
        List Data <?php echo $title; ?> 
        <a data-target="#modal-admin" data-backdrop="static" data-toggle="modal" style="padding: 4px" class="btn btn-sm btn-primary text-black pull-right"><i class="fa fa-plus-square-o fa-lg"></i></a>  
    </div>
    
    <!-- /.panel-heading -->
    <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode catatan BK</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>NIP Bag Pemasaran</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($catatan_bk as $key => $value) {
                ?>
                    <tr idx="<?=$value['kode_catatan_bk'];?>" id="<?=$value['kode_catatan_bk'];?>">
                        <td><?=$key+1;?></td>
                        <td><?=$value['kode_catatan_bk'];?></td>
                        <td><?=$value['nama_brg'];?></td>
                        <td><?=$value['jml_bk'];?></td>
                        <td><?=$value['tgl'];?></td>
                        <td><?=$value['nip_bag_pemasaran'];?></td>
                        <td> 
                            <a data-target="#modal-admin" data-backdrop="static" data-toggle="modal" class="update btn btn-sm btn-white text-black"><i class="fa fa-pencil-square-o fa-lg"></i></a>        
                            <a class="delete btn btn-sm btn-white text-red" href="javascript:;"><i class="fa fa-trash-o fa-lg"></i></a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        
    </div>
    <div id="modal-admin" class="modal fade" role="dialog" style="display:none">
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
            <form name="form-<?php echo $title; ?>" id="myForm" method="POST" class=" form-horizontal">
            <div class="row">
                  <input type="hidden" class="form-control" maxlength="50" required name="kode_catatan_bk" placeholder="Kode catatan bk" value=0>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Barang</label>
                  <div class="col-sm-8">
                  <select name="kode_brg" class="form-control" required="">
                    <?php
                      foreach ($barang as $key => $value) {
                    ?>
                      <option value="<?=$value['kode_brg']?>"><?=$value['nama_brg']?></option>
                    <?php
                      }
                    ?>
                  </select>
                  </div>
                  </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Jumlah</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="jml_bk" placeholder="Jumlah">
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Tanggal</label>
                  <div class="col-sm-8">
                  <input type="date" class="form-control" maxlength="50" required name="tgl" placeholder="Tanggal">
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Bag pemasaran</label>
                  <div class="col-sm-8">
                  <select name="nip_bag_pemasaran" class="form-control" required="">
                    <?php
                      foreach ($pegawai as $key => $value) {
                    ?>
                      <option value="<?=$value['nip']?>"><?=$value['nama_depan']?> <?=$value['nama_belakang']?></option>
                    <?php
                      }
                    ?>
                  </select>
                  </div>
                  </div>              
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default close-modal">Close</button>
            <input type="button" class="btn btn-primary" value="Save" onclick="post_data();"></button>
          </div>
          </form>
        </div>
    </div>
      </div>
    </div>

    <!-- /.panel-body -->
</div>

