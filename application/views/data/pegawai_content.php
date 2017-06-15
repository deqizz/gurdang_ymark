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
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>tgl_lahir</th>
                    <th>Username</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($pegawai as $key => $value) {
                ?>
                    <tr idx="<?=$value['nip'];?>" id="<?=$value['id'];?>">
                        <td><?=$key+1;?></td>
                        <td><?=$value['nip'];?></td>
                        <td><?=$value['nama_depan'];?> <?=$value['nama_belakang'];?></td>
                        <td><?=$value['keterangan'];?></td>
                        <td><?=$value['tgl_lahir'];?></td>
                        <td><?=$value['username'];?></td>
                        <td> 
                            <a data-target="#modal-admin" data-backdrop="static" data-toggle="modal" class="update btn btn-sm btn-white text-black"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                            <a data-target="#modal-change-password" data-backdrop="static" data-toggle="modal" class="change-pass btn btn-sm btn-white text-black"><i class="fa fa-key fa-lg"></i></a>        
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
                  <input type="text" class="form-control" maxlength="50" required name="nip" placeholder="nip" value=0>
                  <input type="text" class="form-control" maxlength="50" name="user_login_id">
                <div class="form-group required" style="margin-bottom: 20px">
                  <label class="col-sm-3 control-label">Nama Depan</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="nama_depan" placeholder="Nama">
                  <input type="hidden" class="form-control" required name="user_login_id">
                  </div>
                </div>
                <div class="form-group required" style="margin-bottom: 20px">
                  <label class="col-sm-3 control-label">Nama Belakang</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="nama_belakang" placeholder="Nama">
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Keterangan</label>
                  <div class="col-sm-8">
                  <select name="keterangan" class="form-control" required="">
                      <option value="bag_gudang">Bagian Gudang</option>
                      <option value="bag_keuangan">Bagian Keuangan</option>
                      <option value="bag_pemasaran">Bagian Pemasaran</option>
                      <option value="admin">admin</option>
                  </select>
                  </div>
                  </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Tanggal lahir</label>
                  <div class="col-sm-8">
                  <input type="date" class="form-control" maxlength="50" required name="tgl_lahir" placeholder="Tanggal lahir">
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Username</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="username" placeholder="Username">
                  </div>
                </div>
                <div class="form-group password required">
                  <label class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-8">
                  <input type="password" class="form-control" maxlength="50" required name="password" id="password" placeholder="Password">
                  </div>
                </div>
                <div class="form-group password required">
                  <label class="col-sm-3 control-label">Password Confirmation</label>
                  <div class="col-sm-8">
                  <input type="password" class="form-control" maxlength="50" required name="password_conf" id="password_conf" placeholder="Password Confirmation">
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

    <div id="modal-change-password" class="modal fade" role="dialog" style="display:none">
      <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo $title; ?> Form<br>
            <small>Ubah password</small>
          </h4>

          </div>
          <div class="modal-body">
            <form name="form-<?php echo $title; ?>" id="passwordForm" method="POST" class=" form-horizontal">
            <div class="alert alert-danger" style="display: none">Wrong password</div>
            <div class="row">
                 <div class="form-group password required">
                  <label class="col-sm-3 control-label">Password Admin</label>
                  <div class="col-sm-8">
                  <input type="hidden" class="form-control" name="id">
                  <input type="password" class="form-control" maxlength="50" required name="password_old" placeholder="Password admin">
                  </div>
                </div>
                <div class="form-group password required">
                  <label class="col-sm-3 control-label">New Password</label>
                  <div class="col-sm-8">
                  <input type="password" class="form-control" maxlength="50" required name="new_password" id="new_password" placeholder="Password Confirmation">
                  </div>
                </div>
                <div class="form-group password required">
                  <label class="col-sm-3 control-label">Password Confirmation</label>
                  <div class="col-sm-8">
                  <input type="password" class="form-control" maxlength="50" required name="new_password_conf" id="new_password_conf" placeholder="Password Confirmation">
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="button" class="btn btn-primary" value="Save" onclick="change_pass();"></button>
          </div>
          </form>
        </div>

      </div>
    </div>
    
    <!-- /.panel-body -->
</div>


