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
                    <th>ID Supplier</th>
                    <th>Nama</th>
                    <th>Nama Perusahaan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($supplier as $key => $value) {
                ?>
                    <tr idx="<?=$value['id_supplier'];?>" id="<?=$value['id_supplier'];?>">
                        <td><?=$key+1;?></td>
                        <td><?=$value['id_supplier'];?></td>
                        <td><?=$value['nama_supplier'];?></td>
                        <td><?=$value['nama_perusahaan'];?></td>
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
                  <input type="hidden" class="form-control" maxlength="50" required name="id_supplier" placeholder="ID Supplier" value="0" id="id">
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Nama Supplier</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="nama_supplier" placeholder="Nama Supplier">
                  </div>
                </div>
                 <div class="form-group required">
                  <label class="col-sm-3 control-label">Nama Perusahaan</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="nama_perusahaan" placeholder="Nama Perusahaan">
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
  
    <!-- /.panel-body -->
</div>


