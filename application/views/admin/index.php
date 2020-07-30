<?php
    $tkekurangan =0;
    $tpemasukan=0;
    foreach($sewa as $s){
        $tpemasukan += $s->total;
        $tkekurangan += $s->kekurangan;
    }

?>
<div class="container-fluid">
  <div class="row">
              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-4 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pemasukan kos</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?php echo $tpemasukan ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-4 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Kekurangan kos</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 mb-2">Rp <?php echo $tkekurangan ?></div>
                        <button class="btn btn-sm btn-warning"><a href="<?php echo base_url()?>admin/dashboard/kurang">cek detail</a></button>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-4 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Kamar kosong</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo count($kostavailable)?> Kost</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-4 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kamar kos Terjual</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 mb-2"> <?php echo count($kostsold);?> Kost</div>
                        <button class="btn btn-sm btn-primary"><a href="<?php echo base_url()?>admin/dashboard/kostsold">cek detail</a></button>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  </div>
</div> 
