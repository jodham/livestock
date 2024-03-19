<section class="navigation-bar">
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-mainbg fixed">
        <a href="<?= base_url()?>">
    <img class="navbar-logo" src="<?= base_url()."static/images/logo2.png"?>" alt="logo"></a>
    <a class="navbar-brand mx-4" href="<?= base_url()?>">BIOTIME</a>
    <button class="navbar-toggler border border-warning" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span>
        <i class="fa fa-bars text-white" aria-hidden="true"></i>
        </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <?php if ($this->session->userdata('logged')):?>
            <?php if(getChangePassState(get_logged_user_id()) == 0){?>
                <li class="nav-item active mx-3">
                    <a class="nav-link" href="<?php echo base_url('admin/admin_dashboard');?>"><?php echo(getUserRole() == 0) ? "Attendance" : "Dashboard"?></a>
                </li>
            <?php }?>
        <?php endif;?>
  
        <li class="nav-item dropdown mx-3">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i>
                <?php if ($this->session->userdata('logged')):?>
                   <?= getUserName(get_logged_user_id())?>
                <?php else:?>
                    Account
                <?php endif; ?>
            </a>  
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php if ($this->session->userdata('logged')):?>
                <?php if(getChangePassState(get_logged_user_id()) == 0){?>
                     <a class="dropdown-item" href="<?= base_url('user/profile/'. get_logged_user_id())?>">Profile</a>
                <?php }?>
                <a class="dropdown-item" href="<?php echo base_url("Welcome/logout");?>">Logout</a>
            <?php else:?>
            <a class="dropdown-item" href="<?php echo base_url('welcome/index')?>">Sign in</a>
            <?php endif;?>
            </div>
        </li>
        </ul>
    </div>
    </nav>
</div>
</section>