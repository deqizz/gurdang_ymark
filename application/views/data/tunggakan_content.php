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
                    <th>Kode Catatan BM</th>
                    <th>Tgl JatuhTempo</th>
                    <th>Alasan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($tunggakan as $key => $value) {
                ?>
                    <tr idx="<?=$value['kode_tunggakan'];?>" id="<?=$value['kode_tunggakan'];?>">
                        <td><?=$key+1;?></td>
                        <td><?=$value['kode_catatan_bm'];?></td>
                        <td><?=$value['tgl_jatuhTempo'];?></td>
                        <td><?=$value['alasan'];?></td>
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
                  <input type="hidden" class="form-control" maxlength="50" required name="kode_tunggakan" placeholder="Kode Tunggakan" value=0>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Kode Catatan BM</label>
                  <div class="col-sm-8">
                  <select name="kode_catatan_bm" class="form-control" required="">
                    <?php
                      foreach ($catatan_bm as $key => $value) {
                    ?>
                      <option value="<?=$value['kode_catatan_bm']?>"><?=$value['kode_catatan_bm']?></option>
                    <?php
                      }
                    ?>
                  </select>
                  </div>
                  </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Tgl JatuhTempo</label>
                  <div class="col-sm-8">
                  <input type="date" class="form-control" maxlength="50" required name="tgl_jatuhTempo" placeholder="Tgl JatuhTempo">
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Alasan</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="alasan" placeholder="Alasan">
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


