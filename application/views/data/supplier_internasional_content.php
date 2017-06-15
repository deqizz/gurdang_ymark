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
                    <th>Asal Negara</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($supplier_internasional as $key => $value) {
                ?>
                    <tr idx="<?=$value['id_supplier'];?>" id="<?=$value['id_supplier'];?>">
                        <td><?=$key+1;?></td>
                        <td><?=$value['id_supplier'];?></td>
                        <td><?=$value['asal_negara'];?></td>
                        <td> 
                            <a data-target="#modal-admin-edit" data-backdrop="static" data-toggle="modal" class="update btn btn-sm btn-white text-black"><i class="fa fa-pencil-square-o fa-lg"></i></a>      
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
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Asal Negara</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="asal_negara" placeholder="Asal Negara">
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
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Asal Negara</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="asal_negara" placeholder="Asal Negara">
                  </div>
                </div>                            
          <div class="modal-footer">
            <button type="button" class="btn btn-default close-modal">Close</button>
            <input type="button" class="btn btn-primary" value="Save" onclick="post_data_edit();"></button>
          </div>
        </div>
    </form>
    </div>
      </div>
    </div>

    
    </div>
    <!-- /.panel-body -->
</div>


