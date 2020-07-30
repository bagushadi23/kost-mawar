<div class="container-fluid">
    <table class="table table-responsive">
        <thead class="thead-primary">
            <th scope="row">NO</th>
            <th>NAMA PENGHUNI</th>
            <th>NAMA KOST</th>
            <th>Kekurangan</th>
            <th>Kelebihan</th>
            <th>Cek In</th>
            <th>Cek Out</th>
        </thead>
    <?php $i=1; foreach($sewa as $k): if($k->kekurangan!=0){?>
        <tbody>
            <th scope="row"><?php echo $i++?></th>
            <td><?php echo $k->nama?></td>
            <td><?php echo $k->namakost?></td>
            <td>Rp <?php echo $k->kekurangan?></td>
            <td>Rp <?php echo $k->kelebihan?></td>
            <td><?php echo $k->cekin?></td>
            <td><?php echo $k->cekout?></td>
        </tbody>
    <?php }endforeach;?>
    </table>
    
    
</div>