<body style="background:#302b63;">
	
    <div class="container">
    <div class="d-flex justify-content-center">
		<div class="user_card">
			<a href="<?php echo base_url()?>"><h1 class="text-center font-colorblack">KOSTKU</h1></a>
			<?php echo $this->session->flashdata('message');?>
                <button class="btn btn-primary text-center"><i class="fas fa-user-tie fa-5x "></i> <hr>Form Login</button><hr>
                <?php echo $this->session->flashdata('pesan')?>
				<div class="d-flex justify-content-center ">
					<form method="post" action="<?php base_url('auth/login')?>">
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
                        <div class="text-center">    
                            <button type="submit" name="button" class="btn btn-primary mb-2">Login</button>
						</div>
					</form> 
				</div>
                <span class="text-center"><a href="<?php echo base_url().'register/index'?>"><button class="btn btn-danger">SignUp</button></a></span>
			</div>
		</div>
    </div>
</body>
