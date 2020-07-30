<div class="container-fluid">
<h2 class="text-center">DETAIL PEMBAYARAN</h2>
        <table class="table">
            <tr>
                <thead class="thead-light">
                    <th scope="col">Jumlah Pembayaran</th>
                    <th scope="col">Konfirmasi Pembayaran</th>
                </thead>
            </tr>
            <tr>
                <tbody>
                    <td>Rp <?php echo $jumlah?></td>
                    <td><a href="<?php echo base_url().'user/dashboard/konfirmasi/'.$sewa->idsewa.'/'.$jumlah?>"><button class="btn btn-sm btn-primary">KONFORMASI</button></a></td>
                </tbody>
            </tr>
        </table>
    <h3 class="text-center">KIRIM PEMBAYARAN KE BANK BERIKUT</h3>
    <div class="row">
        <div class="col-sm-3">
            <div class="card" style="width: 16rem;">
                <img src="<?php echo base_url().'asset/img/payment/mandiri.png'?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text font-text">A.N : Yuli <br> NO REKENING : 10987231093</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card" style="width: 16rem;">
                <img src="<?php echo base_url().'asset/img/payment/bri.png'?>" class="card-img-top" alt="...">
                
                <div class="card-body">
                    <p class="card-text font-text">A.N : Yuli <br> NO REKENING : 10987231093</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card" style="width: 16rem;">
                <img src="<?php echo base_url().'asset/img/payment/bni.png'?>" class="card-img-top" alt="...">
                
                <div class="card-body">
                    <p class="card-text font-text">A.N : Yuli <br> NO REKENING : 10987231093</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card" style="width: 16rem;">
                <img src="<?php echo base_url().'asset/img/payment/bca.png'?>" class="card-img-top" alt="...">
                
                <div class="card-body">
                    <p class="card-text font-text">A.N : Yuli <br> NO REKENING : 10987231093</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card" style="width: 16rem;">
                <img src="<?php echo base_url().'asset/img/payment/btn.png'?>" class="card-img-top" alt="...">
                
                <div class="card-body">
                    <p class="card-text font-text">A.N : Yuli <br> NO REKENING : 10987231093</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card" style="width: 16rem;">
                <img src="<?php echo base_url().'asset/img/payment/ovo.png'?>" class="card-img-top" alt="...">
                
                <div class="card-body">
                    <p class="card-text font-text">A.N : Yuli <br> NO REKENING : 10987231093</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card" style="width: 16rem;">
                <img src="<?php echo base_url().'asset/img/payment/dana.png'?>" class="card-img-top" alt="...">
                
                <div class="card-body">
                    <p class="card-text font-text">A.N : Yuli <br> NO REKENING : 10987231093</p>
                </div>
            </div>
        </div>
    </div> 
    <h2>KONFIRMASI PEMBAYARAN</h2>
</div>