<div class="container-fluid">
    <!-- start filter kost -->
    <div class="row mb-4 ml-1 text-uppercase">
        <form action="<?php echo base_url().'dashboard/kostbyfilter/'?>" method="POST">
            <select name="keterangan" id="keterangan">
                <option value="default">keterangan</option>
                <option value="SOLD">SOLD</option>
                <option value="AVAILABLE">AVAILABLE</option>
            </select>
            <select name="kota" id="kota">
                <option value="default">kota</option>
                <option value="yogyakarta">YOGYAKARTA</option>
                <option value="jakarta">JAKARTA</option>
                <option value="Malang">MALANG</option>
            </select>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-filter"></i></button>
        </form>
        <a href="http://localhost/kostku/"><button class="btn btn-sm btn-danger ml-2"><i class="fas fa-trash-alt"></i></button></a>
    </div>
    <!-- end filter kost -->

    <!-- start data kost -->
    <div class="row">
    <?php foreach($kost as $k):?>
        <div class="col-md-3">
            <div class="card mb-3 text-center">
                <img src="<?php echo $asset.$k->gambar?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title font-text text-center font-weight-bold"><?php echo $k->namakost?></h5>
                    <a href="#" class="btn btn-sm btn-dark mb-2"><?php echo rupiah($k->harga)?></a><br>
                    <?php
                        if($k->keterangan=="Sold"){
                            echo "<button type='button' class='btn btn-sm btn-danger mb-2'>SOLD</button>";
                        }else{
                            echo "<button type='button' class='btn btn-sm btn-success mb-2'>AVAILABLE</button>";
                        }
                    ?>
                    <a href="#" class="btn btn-sm btn-warning mb-2"><?php echo ($k->kota)?></a><hr>
                    <a href="<?php echo base_url().'dashboard/detail/'.$k->idkost?>"><button class="btn btn-sm btn-info">DETAIL</button></a>
                    <a href="<?php echo base_url().'booking/pembayaran/'.$k->idkost?>"><button class="btn btn-sm btn-primary">BOOKING</button></a>
                </div>
            </div>
        </div>
    <?php endforeach?>
    </div>
    <!-- start data kost -->
</div>