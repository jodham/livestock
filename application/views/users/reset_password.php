<section class="section-container">
    <div class="container">
        <div class="row my-2">
            <div class="col-md-12 p-2 text-center">
                <span class="title">
                    Change Password
                </span>
            </div>
        </div>
        <form class="row forgot-password-wrapper mt-3 shadow" id="reset-password-form" method='post' action="<?php echo base_url('user/reset_password'); ?>">
            <div class="col-md-7 p-3">

                <div class="mx-auto form-group">
                    <label class="fw-bold h6">Enter Current Password</label>
                    <div class='input-group'>
                        <input type="password" class="form-control" required value="<?= $current_password ?>" placeholder="input current password" name="current_password" id="current-password-field">
                        <button type="button" class="btn btn-outline-secondary" id="current-password-toggle">
                            <i class="fa fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="mx-auto form-group">
                    <label class="fw-bold h6">Enter New Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" required value="<?= $new_password ?>" placeholder="new password" name="new_password" id="new-password-field">
                        <button type="button" class="btn btn-outline-secondary" id="new-password-toggle">
                            <i class="fa fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="mx-auto form-group">
                    <label class="fw-bold h6">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" required class="form-control" value="<?= $confirm_password ?>" placeholder="confirm new password" name="confirm_password" id="confirm-password-field">
                        <button type="button" class="btn btn-outline-secondary" id="confirm-password-toggle">
                            <i class="fa fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2" style="background-color: #CCE0F9;">
                <p class="text-center"><i class="bi bi-info-circle"></i> <i>Password requirement</i></p>
                <p class="mt-2">Password should contain atleast :</p>
                <p class="mt-2">i. 1 Uppercase letter i.e ABCD..</p>
                <p class="mt-2">ii. 1 Lowercase letter i.e abcd..</p>
                <p class="mt-2">iii. a special character i.e @#$%&*?</p>
                <p class="mt-2">iv. a number i.e 123..</p>
                <p class="mt-2">iv. A minimum length of 8 characters.</p>
                </div>

                <div class="col-md-12 m-3">
                <button type='submit' class='btn btn-sm btn-secondary text-white fw-bold'>Submit</button>
                </div>

        </form>
    </div>
</section>