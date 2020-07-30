<div class="container-fluid">
    <h2 class="text-center">FORM KONFIRMASI</h2>
    <form action="<?php echo base_url(). 'booking/paymentconfirm'?>" method="post">
        <div class="form-group">
            <label for="anbank">Atas Nama</label>
            <input type="text" class="form-control" name="anbank" required>
            <input type="hidden" class="form-control" name="idkost" value="<?php echo $kost['idkost']?>">
            <input type="hidden" class="form-control" name="namakost" value="<?php echo $kost['namakost']?>">      
        </div>
        <div class="form-group">
            <label for="bank">BANK</label>
            <input type="text" class="form-control" name="bank" required>
        </div>
        <div class="form-group">
            <label for="bulan">LAMA KOST : </label>
            <select name="bulan" id="bulan" required>
                        <option value="1bulan">1 BULAN</option>
                        <option value="2bulan">2 BULAN</option>
                        <option value="2bulan">2 BULAN</option>
            </select>
        </div>
        <div class="form-group">
            <label for="notelp">NO TELP (WA/SMS)</label>
            <input type="text" class="form-control" name="notelp" required>
        </div>
        <div class="form-group">
            <label for="mulaikost">MULAI KOST TANGGAL:</label>
            <input type="date" class="form-control" name="mulaikost">
        </div>
        <div class="form-group">
            <label for="jumlah">JUMLAH</label>
            <input type="text" class="form-control" name="jumlah" value="<?php echo rupiah($dp)?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>