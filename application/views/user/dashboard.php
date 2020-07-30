<?php foreach($datasewa as $detail):?>
<?php echo $this->session->flashdata('message');?>
<div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kelebihan Pembayaran</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?php echo $detail->kelebihan ?></div>
                      
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kekurangan Pembayaran</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?php echo $detail->kekurangan ?></div>
                      <br>
                      <a href="<?php echo base_url().'user/dashboard/info/'.$detail->idsewa?>"><button class="btn btn-sm btn-danger text-uppercase">BAYAR</button></a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pembayaran Selanjutnya</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?php echo ($detail->harga-$detail->kelebihan)+$detail->kekurangan ?></div>
                      <div class="mb-0 font-weight text-gray-800"><?php echo $detail->cekout ?></div>
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Akumalasi dengan kekurangan pembayaran dan kelebihan dan harga sewa perbulan</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sisa Kost</div>
                      <?php
                            $tgl1 = new DateTime();
                            $tgl2 = new DateTime($detail->cekout);
                            $d = $tgl2->diff($tgl1)->days + 1;
                        ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $d?> Hari</div>
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Cek In <?php echo $detail->cekin ?></div>
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Cek Out <?php echo $detail->cekout ?></div>
                      <a href="<?php echo base_url().'user/dashboard/perpanjang/'.$detail->idsewa?>"><button class="btn btn-sm btn-warning text-uppercase">Perpanjangan</span></a> 
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<?php endforeach?>