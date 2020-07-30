<div class="container">
    <?php foreach ($user as $k):?>
    <form action="<?php echo base_url(). 'user/dashboard/updateuser';?>" method="post">
        <div class="form-group">
            <label for="namakost">nama</label>
            <input type="hidden" name="id" value="<?php echo $k->id ?>">
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $k->nama ?>">
        </div>
        <div class="form-group">
            <label for="harga">no hp</label>
            <input type="text" class="form-control" id="alamat" name="nohp" value="<?php echo $k->nohp ?>">
        </div>
        <div class="form-group">
            <label for="harga">email</label>
            <input type="text" class="form-control" id="alamat" name="email" value="<?php echo $k->email ?>">
        </div>
        <div class="form-group">
            <label for="harga">username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $k->username ?>">
        </div>
        <div class="form-group">
            <label for="harga">password</label>
            <input type="text" class="form-control" id="password" name="password" value="<?php echo $k->password ?>">
        </div>
        <div class="form-group">
            <label for="harga">alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $k->alamat ?>">
        </div>
        <div class="form-group">
            <label for="kota">Jenis Kelamin</label>
            <select class="form-control" id="kota" name="jk">
                <option value="L">Laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    <?php endforeach;?>
</div>