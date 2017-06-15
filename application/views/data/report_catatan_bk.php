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
                    <th>Kode catatan BK</th>
                    <th>Kode Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>NIP Bag Pemasaran</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($catatan_bk as $key => $value) {
                ?>
                    <tr idx="<?=$value['kode_catatan_bk'];?>" id="<?=$value['kode_catatan_bk'];?>">
                        <td><?=$key+1;?></td>
                        <td><?=$value['kode_catatan_bk'];?></td>
                        <td><?=$value['kode_brg'];?></td>
                        <td><?=$value['jml_bk'];?></td>
                        <td><?=$value['tgl'];?></td>
                        <td><?=$value['nip_bag_pemasaran'];?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        
    </div>
</div>