<div class="container-fluid">
    <h4 class="text-center font-colorblack" style="font-weight:bold;">
        <a class="btn text-center warna-btn-custom" href="<?php echo base_url()?>">HOME</a><br><hr>
        <?php echo $kost['namakost']?></h4>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm ">
                <img src="<?php echo $asset.$kost['gambar']?>" class="card-img-top mb-2" alt="...">
            </div>
            <div class="col-2"></div>
            <div class="col-auto ">
                <div class="list-group text-center ">
                    <button type="button" class="list-group-item list-group-item-action active">
                        <?php echo rupiah($kost['harga'])?> /Bulan
                    </button>
                </div>
                <?php 
                    $string = $kost['fasilitas'];
                    $myArray = explode(',', $string);
                    for ($i=0; $i < count($myArray); $i++){ 
                        if ($myArray[$i]=='AC') {
                            echo "<button type='button' class='list-group-item list-group-item-action mr-2 text-uppercase'><img src='https://img.icons8.com/ios/25/000000/air-conditioner.png'/ class='mr-3'> Include AC</button>";
                        }elseif ($myArray[$i]=='TV') {
                            echo "<button type='button' class='list-group-item list-group-item-action text-uppercase'><i class='fas fa-tv mr-4'></i>Include TV</button>";
                        }elseif ($myArray[$i]=='WIFI') {
                            echo "<button type='button' class='list-group-item list-group-item-action text-uppercase'><i class='fas fa-wifi mr-4'></i>Include Wifi</button>";
                        }elseif ($myArray[$i]=='LOUNDRY') {
                            echo "<button type='button' class='list-group-item list-group-item-action text-uppercase'><img src='https://img.icons8.com/ios/25/000000/washing-machine.png' class='mr-3'/>Include Loundry</button>";
                        }elseif ($myArray[$i]=='LISTRIK') {
                            echo "<button type='button' class='list-group-item list-group-item-action text-uppercase'><i class='fas fa-bolt mr-5'></i>Include Listrik</button>";
                        }elseif ($myArray[$i]=='24JAM') {
                            echo "<button type='button' class='list-group-item list-group-item-action text-uppercase'><i class='fas fa-clock mr-4'></i>KOST 24 JAM</button>";
                        }
                    }
                ?>
                <small type="button" class="list-group-item list-group-item-action">*harga dapat berubah kapan pun</small>
                <?php 
                    if($kost['keterangan']=="Sold"){
                        echo "<button type='button' class='btn btn-danger btn-lg btn-block mt-2' disabled>SOLD</button>";
                    }else{
                        echo "<a href=".base_url()."/booking/pembayaran/".$kost['idkost']."><button class='btn btn-primary btn-lg btn-block mt-2'>BOOKING</button></a>";
                    }
                ?>
                </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <h5 class="font-text">Diskripsi</h5>
        <p class="font-text"><?php echo $kost['diskripsi'];?></p>
            <table class="table table-sm font-text">
                <tr>
                    <td>KOTA</td>
                    <td><?php echo $kost['kota'];?></td>
                </tr>
                <tr>
                    <td>KECAMATAN</td>
                    <td><?php echo $kost['kecamatan'];?></td>
                </tr>
                <tr>
                    <td>ALAMAT LENGKAP</td>
                    <td><?php echo $kost['Alamat'];?></td>
                </tr>
            </table>
    </div>   
</div>