<div class="panel panel-default">
    <div class="panel-heading" style="overflow: hidden">
        List Data <?php echo $title; ?> 
    </div>
    <div class="panel-body">
    <!-- /.panel-heading -->
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-export">        
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode catatan BM</th>
                    <th>Kode Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>NIP Bag Keuangan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($catatan_bm as $key => $value) {
                ?>
                    <tr idx="<?=$value['kode_catatan_bm'];?>" id="<?=$value['kode_catatan_bm'];?>">
                        <td><?=$key+1;?></td>
                        <td><?=$value['kode_catatan_bm'];?></td>
                        <td><?=$value['kode_brg'];?></td>
                        <td><?=$value['jml_bm'];?></td>
                        <td><?=$value['tgl'];?></td>
                        <td><?=$value['nip_bag_keuangan'];?></td>
                        <td><?php 
                            if($value['status']==0){
                              echo"<div class='label label-danger'>Non active</div>";  
                            }else{
                              echo"<div class='label label-success'>Active</div>";  
                              
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        
    </div>
</div>