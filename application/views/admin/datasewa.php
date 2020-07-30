<div class="container-fluid">
    <?php echo $this->session->flashdata('message');?>
    <div class="col-sm-4">
            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambah_kost">
                Tambah Sewa
            </button>
    </div>
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
    <?php $i=1; foreach($sewa as $k):?>
        <tbody>
            <th scope="row"><?php echo $i++?></th>
            <td><?php echo $k->nama?></td>
            <td><?php echo $k->namakost?></td>
            <td>Rp <?php echo $k->kekurangan?></td>
            <td>Rp <?php echo $k->kelebihan?></td>
            <td><?php echo $k->cekin?></td>
            <td><?php echo $k->cekout?></td>
            <td>
                <?php echo anchor('admin/sewa/editsewa/'.$k->idsewa,'<div class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></div>');?>
                <?php echo anchor('admin/sewa/delete/'.$k->idsewa."-".$k->idkost,'<div class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></div>');?></td>
        </tbody>
    <?php endforeach;?>
    </table>
    <<div class="modal font-text" tabindex="-1" role="dialog" id="tambah_kost">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-home"></i> TAMBAH SEWA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="<?php echo base_url(). 'admin/sewa/insert';?>" method="post">
                    <div class="form-group">
                        <label for="keterangan">KOST: <small>nama kost (id kost)</small></label>
                            <select class="form-control" id="keterangan" name="idkost">
                                <?php foreach($kost as $k):?>
                                    <option value="<?php echo $k->idkost?>,<?php echo $k->harga?>"><?php echo $k->namakost?>(<?php echo $k->idkost?>)</option>
                                <?php endforeach?>
                            </select>
                    </div>
                    <?php foreach($kost as $k):?>
                    <?php endforeach?>
                    <div class="form-group">
                        <label for="keterangan">USER: <small>nama kost(id user)</small></label>
                            <select class="form-control" id="keterangan" name="iduser">
                                <?php foreach($user as $u):?>
                                    <option value="<?php echo $u->id?>"><?php echo $u->nama?>(<?php echo $u->id?>)</option>
                                <?php endforeach?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">CEK IN</label>
                        <input class="form-control" type="date" name="cekin">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">CEK OUT</label>
                        <input class="form-control" type="date" name="cekout">
                    </div>    
                    <div class="form-group">
                        <label for="namakost">JUMLAH TERBAYAR</label>
                        <input type="text" class="form-control" id="pembayaran" name="pembayaran">
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
                </div>
                </div>
            </div>
    </div>
</div>