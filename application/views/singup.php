<body style="background:#302b63;">
    <div class="container">
    <div class="d-flex justify-content-center">
		<div class="user_card">
			<a href="<?php echo base_url()?>"><h1 class="text-center font-colorblack">KOSTKU</h1></a>
                <button class="btn btn-primary text-center"><i class="fas fa-user-tie fa-5x "></i> <hr>Form SignUp</button><hr>
				<div class="d-flex justify-content-center ">
					<form method="post" action="<?php base_url().'registrasi/index'?>">
                        <div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
                            <input type="text" name="nama" class="form-control" placeholder="nama lengkap">
						</div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" name="nohp" class="form-control" placeholder="No Telp">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="far fa-envelope"></i></span>
                            </div>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                        <?php echo form_error('nama','<div class="text-danger small">','</div>');?>
                        <div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
                            <input type="text" name="username" class="form-control" placeholder="username">
						</div>
                        <?php echo form_error('username','<div class="text-danger small">','</div>');?>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control" placeholder="password">
                        </div>
                        <?php echo form_error('password','<div class="text-danger small">','</div>');?>
                        <div class="input-group mb-3">
                            <div class="form-group">
                                <label for="kota">Jenis Kelamin</label>
                                <select class="form-control" id="kota" name="jk">
                                    <option value="L">Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
						</div>
                        <div class="text-center">    
                            <button type="submit" name="button" class="btn btn-danger mb-2">Sing Up</button>
                        </div>
					</form>
				</div>
                <span class="text-center"><a href="<?php echo base_url().'auth/login'?>"><button class="btn btn-primary">Sing In</button></a></span>
			</div>
		</div>
    </div>
</body>
