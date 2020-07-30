<div class="container">
    <?php foreach($sewa as $s):?>
    <form action="<?php echo base_url(). 'admin/sewa/edit';?>" method="post">
        <div class="form-group">
            <label for="harga">Kekurangan</label>
            <input type="hidden" class="form-control" name="idsewa" value="<?php echo $s->idsewa ?>">
            <input type="hidden" class="form-control" name="idkost" value="<?php echo $s->idkost ?>">
            <input type="hidden" class="form-control" name="id" value="<?php echo $s->id ?>">
            <input type="text" class="form-control" name="kekurangan" value="<?php echo $s->kekurangan ?>" disabled>
        </div>
        <div class="form-group">
            <label for="harga">Kelebihan</label>
            <input type="text" class="form-control" name="kelebihan" value="<?php echo $s->kelebihan ?>">
        </div>
        <div class="form-group">
            <label for="harga">Tambah Pembayaran</label>
            <p class="font-text">(total pembayaran masuk : <?php echo rupiah($s->total) ?>)</p>
            <input type="text" class="form-control" name="masuk">
        </div>
        <div class="form-group">
            <label for="harga">cek out</label>
            <input type="hidden" class="form-control" name="cekin" value="<?php echo $s->cekin ?>">
            <input type="date" class="form-control" name="cekout" value="<?php echo $s->cekout ?>">
        </div>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
    <?php  endforeach;?>
</div>