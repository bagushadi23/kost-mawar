<div class="container-fluid">
    <?php echo $this->session->flashdata('message');?>
    <div class="row">
        <div class="col-sm-4">
            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambah_kost">
                Tambah kost
            </button>
        </div>
        <div class="col-sm-4">
                <h3 >LIST KOST</h3>
        </div>
    </div>
    <table class="table table-responsive">
        <thead>
            <th></th>
            <th>NAMA KOST</th>
            <th>HARGA KOST</th>
            <th>KOTA</th>
            <th>TIPE</th>
            <th>KETERANGAN</th>
            <th>AKSI</th>
        </thead>
        <?php foreach($kost as $k):?>
        <tbody>
            <td><img src="<?= $asset.$k->gambar?>" class="img-tumbnail-custom"></td>
            <td><?= $k->namakost?></td>
            <td><?= $k->harga?></td>
            <td><?= $k->kota?></td>
            <td><?= $k->type?></td>
            <td><?php
                $sold="SOLD"; 
                if($k->keterangan=="Sold"){
                    echo "<button type='button' class='btn btn-sm btn-success'>SOLD</button>";
                }else if($k->keterangan=="Available"){
                    echo "<button class='btn btn-sm btn-info'>AVAILABLE</button>";
                }
                ?></td>
            <td>
                <a href="<?= base_url().'admin/kost/update/'.$k->idkost?>"><button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></i></button></a>
                <a href="<?= base_url().'admin/kost/delete/'.$k->idkost?>"><button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button></a>
            </td>
        </tbody>
        <?php endforeach?>
    </table>
    <!-- Button trigger modal -->
    <div class="row">
        <div class="col">
            <!--Tampilkan pagination-->
            <?php echo $pagination;?>
        </div>
    </div>

<!-- Modal -->
    <<div class="modal font-text" tabindex="-1" role="dialog" id="tambah_kost">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-home"></i> TAMBAH KOST</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(). 'admin/kost/tambah';?>" method="post" enctype="multipart/form-data"> 
                        <div class="form-group">
                            <label for="namakost">NAMA KOST</label>
                            <input type="text" class="form-control" id="namakost" name="namakost">
                        </div>
                        <div class="form-group">
                            <label for="harga">HARGA</label>
                            <input type="text" class="form-control" id="harga" name="harga">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">KETERANGAN</label>
                            <select class="form-control" id="keterangan" name="keterangan">
                                <option value="Sold">SOLD</option>
                                <option value="Available">AVAILABLE</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type">TYPE</label>
                            <select class="form-control" id="type" name="type">
                                <option value="Mahasiswa">MAHASISWA</option>
                                <option value="Keluarga">KELUARGA</option>
                                <option value="Eksklusif">EKSKLUSIF</option>
                                <option value="Wanita">WANITA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fasilitas">FASILITAS</label><br>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="KMD" name="KMD">
                            <label class="form-check-label" for="inlineCheckbox1">KAMAR MANDI DALAM</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="KD" name="KD">
                            <label class="form-check-label" for="inlineCheckbox2">KLOSET DUDUK</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="KASUR" name="KASUR">
                            <label class="form-check-label" for="inlineCheckbox2">KASUR</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="AC" name="AC">
                            <label class="form-check-label" for="inlineCheckbox2">AC</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="WIFI" name="WIFI">
                            <label class="form-check-label" for="inlineCheckbox2">WIFI</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="24JAM" name="24JAM">
                            <label class="form-check-label" for="inlineCheckbox2">24 JAM (Bebas)</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="LOUNDRY" name="LOUNDRY">
                            <label class="form-check-label" for="inlineCheckbox2">LOUNDRY</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name ="TV" value="TV">
                            <label class="form-check-label" for="inlineCheckbox2">TV</label>
                        </div>
                        <div class="form-group mt-2">
                            <label for="kota">KOTA</label>
                            <select class="form-control" id="kota" name="kota">
                                <option value="Yogyakarta">YOGYAKARTA</option>
                                <option value="Malang">MALANG</option>
                                <option value="Jakarta">JAKARTA</option>
                                <option value="Surabaya">SURABAYA</option>
                                <option value="Bandung">Bandung</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">KECAMATAN</label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan">
                        </div>
                        <div class="form-group">
                            <label for="alamat">ALAMAT</label>
                            <input type="text" class="form-control" id="alamat" name="Alamat">
                        </div>
                        <div class="form-group">
                            <label for="diskripsi">DISKRIPSI</label>
                            <textarea class="form-control" id="diskripsi" rows="3" name="diskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="gambar">GAMBAR</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
    </div>
</div>