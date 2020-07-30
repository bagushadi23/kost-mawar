<div class="container-fluid">
    <?php foreach($datasewa as $krg):?>
    <h2 class="text-center">FORM KONFIRMASI</h2>
    <form action="<?php echo base_url(). 'user/dashboard/bayarkurang'?>" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Atas Nama</label>
            <input type="text" class="form-control" name="anbank" aria-describedby="emailHelp">
            <input type="hidden" class="form-control" id="id" aria-describedby="emailHelp" value="<?php echo $krg->id?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">BANK</label>
            <input type="text" class="form-control" name="bank">
        </div>
        <div class="form-group">
            <label for="Pembayaran">Jenis Pembayaran</label>
                <select class="form-control" id="Pembayaran" name="Pembayaran">
                    <option value="kekurangan">KEKURANGAN</option>
                    <option value="perpanjang">PERPANJANG</option>
                </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">JUMLAH</label>
            <input type="text" class="form-control" name="jumlah" value="<?php echo $jumlah?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php endforeach?>
</div>