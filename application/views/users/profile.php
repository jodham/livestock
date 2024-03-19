<section class="section-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-2 text-center">
                <span class="title">Profile</span>
                <!-- <a href="<? // base_url('user/reset_password')?>" class="btn-sm btn-secondary add_userbtn">Reset password</a> -->
            </div>
        </div>
        <div class="row">        
                <div class="col-md-12">                            
                    <div class="col-md-12 profile-header">
    
                        <div class="profile-img">
                            <img src="<?php echo base_url('static/images/avatar.png')?>" width="200" alt="Profile Image">
                        </div>
                        <div class="profile-nav-info">
                                <h3 class="user-name"><?=  getUserNames($userdetails->id);?></h3>                            
                            <div class="address">
                            <p id="state" class="state">Access Level :</p>
                            <span id="country" class="country text-capitalize">
                                <?php echo (getUserRole() == 1) ? "Superuser" : "Default"?>
                            </span>
                            </div>
                    
                        </div>

                        <div class="profile-option">
                        <span class=""><?php echo $userdetails->email ?></span>      
                        </div>

                    </div>     
                

                </div>
        </div> 
    </div>
</section>