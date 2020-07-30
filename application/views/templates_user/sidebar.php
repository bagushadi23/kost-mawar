
<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
          <br>
          <div class="sidebar-brand-text mx-3 text-center"><a href="<?php echo base_url()?>"><h4><i class="fas fa-home mr-2"></i>KOSTKU</h4></a></div>
            <ul class="list-unstyled components">
                <li>
                    <a href="<?= base_url().'user/dashboard'?>">
                        <i class="fas fa-home mr-3"></i> DASHBOARD
                    </a>
                </li>
                <li>
                    <a href="<?= base_url().'user/dashboard/edit'?>">
                        <i class="fas fa-user mr-3"></i>  EDIT AKUN
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn warna-btn-custom">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                    <div class="text-right">
                        <?php if($this->session->userdata('username')){?>
                            <button class="btn btn-primary"><div><i class="fas fa-user-tie mr-2"></i><?php echo $this->session->userdata('nama')?></div></button>
                            <button class="btn btn-danger"><div><?php echo anchor('auth/logout','logout')?></div></button>
                        <?php }else{?>
                            <button class="btn btn-primary warna-btn-custom"><a href=""> <i class="fas fa-sign-in-alt"></i> <?php echo anchor('auth/login','Login')?></a></button>
                        <?php }?>
                    </div>
                </div>
            </nav>