<div class="home-content">
        <form class="row sign-in-form mx-auto mt-3" action="<?= base_url("welcome/signin")?>" method="post">
            <div class="col-md-12 text-center my-2">
             
             <img src="<?= base_url("static/assets/juelgaicon.png")?>" alt="logo" style="height: 4rem;, width: 5rem;">
             <p class="logo me-auto m-3 site-title">Juelga</p>
             <!-- <p>ZETECH UNIVERSITY</p> -->
            </div> 
            <div class="col-md-12 form-group my-2">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?= $email ?>" required placeholder="email" class="form-control my-1">
            </div>
            <div class="col-md-12 form-group my-2">
                <label for="password">Password</label>
                <input type="password" name="password" value="<?= $password?>" id="password" required placeholder="password" class="form-control my-1">
            </div>
            <div class="col-md-12 my-2">
                <button type="submit" class="btn btn-sm btn-secondary">Login</button>
                <!-- <a href="<?// base_url('user/forgot_password');?>" class="mx-4">forgot password</a> -->
            </div>
        </form>
    </div>
