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
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Merk</th>
                    <th>Jumlah Barang</th>
                    <th>Harga</th>
                    <th>Nip Bag Gudang</th>
                    <th>Supplier</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($barang as $key => $value) {
                ?>
                    <tr idx="<?=$value['kode_brg'];?>" id="<?=$value['kode_brg'];?>">
                        <td><?=$key+1;?></td>
                        <td><?=$value['nama_brg'];?></td>
                        <td><?=$value['kode_kategori'];?></td>
                        <td><?=$value['merk'];?></td>
                        <td><?=$value['jml_brg'];?></td>
                        <td><?=$value['harga'];?></td>
                        <td><?=$value['nip_bag_gudang'];?></td>
                        <td><?=$value['id_supplier'];?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        
    </div>
    <!-- /.panel-body -->
</div>


