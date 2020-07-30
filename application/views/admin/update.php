<div class="container-fluid">
    <form action="<?php echo base_url(). 'admin/kost/ubah';?>" method="post" enctype="multipart/form-data"> 
        <div class="form-group">
            <label for="namakost">NAMA KOST</label>
            <input type="hidden" name="idkost" value="<?= $kost['idkost']?>">
            <input type="hidden" name="gambar" value="<?= $kost['gambar']?>">
            <input type="text" class="form-control" id="namakost" name="namakost" value="<?= $kost['namakost']?>">
        </div>
        <div class="form-group">
            <label for="harga">HARGA</label>
            <input type="text" class="form-control" id="harga" name="harga" value="<?= $kost['harga']?>">
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
            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $kost['kecamatan']?>">
        </div>
        <div class="form-group">
            <label for="alamat">ALAMAT</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $kost['Alamat']?>" >
        </div>
        <div class="form-group">
            <label for="diskripsi">DISKRIPSI</label>
            <textarea class="form-control" id="diskripsi" rows="3" name="diskripsi" value="<?= $kost['diskripsi']?>"></textarea>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
</div>