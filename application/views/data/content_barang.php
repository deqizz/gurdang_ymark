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
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Merk</th>
                    <th>Jumlah Barang</th>
                    <th>Harga</th>
                    <th>Nip Bag Gudang</th>
                    <th>Supplier</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($barang as $key => $value) {
                ?>
                    <tr idx="<?=$value['kode_brg'];?>" id="<?=$value['kode_brg'];?>">
                        <td><?=$key+1;?></td>
                        <td><?=$value['kode_brg'];?></td>
                        <td><?=$value['nama_brg'];?></td>
                        <td><?=$value['nama_kategori'];?></td>
                        <td><?=$value['merk'];?></td>
                        <td><?=$value['jml_brg'];?></td>
                        <td><?=$value['harga'];?></td>
                        <td><?=$value['nip_bag_gudang'];?></td>
                        <td><?=$value['id_supplier'];?></td>
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
                  <input type="hidden" class="form-control" required id="kode_brg" name="kode_brg" placeholder="Kode Barang" value="0">
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Nama Barang</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="nama_brg" placeholder="Nama Barang" >
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Kategori</label>
                  <div class="col-sm-8">
                  <select name="kode_kategori" class="form-control" required="">
                    <?php
                      foreach ($kategori as $key => $value) {
                    ?>
                      <option value="<?=$value['kode_kategori']?>"><?=$value['nama']?></option>
                    <?php
                      }
                    ?>
                  </select>
                  </div>
                  </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Merk</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="merk" placeholder="merk">
                  </div>
                </div>
                 <div class="form-group required">
                  <label class="col-sm-3 control-label">Harga</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="harga" placeholder="Harga">
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Bag Gudang</label>
                  <div class="col-sm-8">
                  <select name="nip_bag_gudang" class="form-control" required="">
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
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Supplier</label>
                  <div class="col-sm-8">
                  <select name="id_supplier" class="form-control" required="">
                    <?php
                      foreach ($supplier as $key => $value) {
                    ?>
                      <option value="<?=$value['id_supplier']?>"><?=$value['nama_supplier']?></option>
                    <?php
                      }
                    ?>
                  </select>
                  </div>
                  </div>                                
          <div class="modal-footer">
            <button type="button" class="btn btn-default close-modal">Close</button>
            <input type="button" class="btn btn-primary" value="Save" onclick="post_data();"></button>
          </div>
        </div>
    </form>
    </div>
      </div>
    </div>
    </div>
  </div>
 
  
    <!-- /.panel-body -->
</div>


