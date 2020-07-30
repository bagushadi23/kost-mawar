<?php foreach($perpanjang as $krg):?>
<script>
          function change(value){  
              if(value==0){
                document.getElementById("count").value=<?php echo $krg->kekurangan+$krg->kelebihan?>;
                var tgl = "<?php echo $krg->cekout?>";
                var dt = new Date(tgl);
                dt.setDate(dt.getDate());
                let formatted_date = dt.getFullYear() + "-" + (dt.getMonth() + 1) + "-" + dt.getDate();
                document.getElementById("tanggal").value=formatted_date;
              }else{
                document.getElementById("count").value=(value*<?php echo $krg->harga?>+<?php echo $krg->kekurangan+$krg->kelebihan?>);
                var tgl = "<?php echo $krg->cekout?>";
                var dt = new Date(tgl);
                dt.setDate(dt.getDate()+(value*31));
                let formatted_date = dt.getFullYear() + "-" + (dt.getMonth() + 1) + "-" + dt.getDate();
                document.getElementById("tanggal").value=formatted_date;
              }
          }

          function rubah(msg){
            alert(msg);
          }

</script>
<div class="container-fluid">
    <h2 class="text-center">FORM PERPANJANG</h2>
    <form action="<?php echo base_url(). 'user/dashboard/getinfo/'.$krg->idsewa?>" method="post">
    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">BULAN</label>
    </div>
        <select class="custom-select" id="inputGroupSelect01" onchange="change(value)">
            <option value="0">Pilih</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
    </div>
    <span class="font-text text-justify">AKUMALASI DENGAN KEKURANGAN PEMBAYARAN DAN KELEBIHAN DAN HARGA SEWA PERBULAN
    </span>
    <hr>
    <div class="form-group font-text">
        <label for="exampleInputPassword1">KOST BERAKHIR:</label>
        <input type="text" class="form-control" name="jumlah" id="tanggal" value="<?php echo $krg->cekout?>">
    </div>
    <div class="form-group font-text">
        <label for="exampleInputPassword1">JUMLAH PEMBAYARAN:</label>
        <input type="text" class="form-control" name="jumlah" id="count" value="<?php echo $krg->kekurangan+$krg->kelebihan?>">
    </div>
    <button type="submit" class="btn btn-primary">GET DETAIL PEMBAYARAN</button>
    </form>
    <?php endforeach?>
</div>