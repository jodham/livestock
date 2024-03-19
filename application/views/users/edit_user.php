<section class="section-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center p-2">
                <span class="title">Add User</span>
            </div>
        </div>
        <form action="<?php base_url("user/edit_user/". $user_id)?>" method="post" class="row p-2 dashboard-row">
            <div class="col-md-4 form-group">
                <label for="fname">First Name:</label>
                <input type="text" name="fname" value="<?= $setFname ?>" class="form-control" id="fname" placeholder="first name" required />
            </div>
            <div class="col-md-4 form-group">
                <label for="lname">Last Name:</label>
                <input type="text" name="lname" value="<?= $setLname ?>"  class="form-control" id="lname" placeholder="last name" required />
            </div>
            <div class="col-md-4 form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?= $setEmail ?>" class="form-control" id="email" placeholder="name@zetech.ac.ke" required />
            </div>
            <div class="col-md-4 form-group">
                <label for="password">Staff No:</label>
                <input type="text" name="staff_no" value="<?= $setStaffNo ?>" class="form-control" id="staffno" placeholder="Zu/0001" required />
            </div>
    
            <div class="col-md-4 form-group password-container">
                <label for="password-input">Password</label>
                <input type="password" id="password-input" value="<?= $password ?>" name="password" class="password-input form-control">
                <img src="https://img.icons8.com/material-outlined/24/000000/invisible.png" id="eye-icon" class="eye-icon" onclick="togglePassword()" alt="Toggle Password Visibility">
            </div>
            <div class="col-md-4 form-group">
                <label for="level">Access Level</label><br>
                <input type="radio" value="0" name="level" id="level" <?php echo ($role == 0) ? 'checked' : ''; ?>>
                <span class="mx-3">Default</span><br>

                <input type="radio" value="1" name="level" id="level" <?php echo ($role == 1) ? 'checked' : ''; ?>> <span class="mx-3">Super User</span>
            </div>
            <div class="col-md-4 form-group">
                <label for="level">Account status</label><br>
                <input type="radio" value="1" name="status" id="status" <?php echo ($status == 1) ? 'checked' : ''; ?>>
                <span class="mx-3">Active</span><br>

                <input type="radio" value="0" name="status" id="status" <?php echo ($status == 0) ? 'checked' : ''; ?>> <span class="mx-3">Not Active</span>
            </div>
            <div class="col-md-12 p-2">
                <button type="submit"class="btn btn-secondary mt-3 btn-sm">Submit</button>
            </div>
        </form>
    </div>
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById('password-input');
            var eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.src = 'https://img.icons8.com/material-outlined/24/000000/visible.png';
            } else {
                passwordInput.type = 'password';
                eyeIcon.src = 'https://img.icons8.com/material-outlined/24/000000/invisible.png';
            }
        }
    </script>
</section>