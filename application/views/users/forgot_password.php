<section class="section-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-2 mt-2 text-center">
                <span class="title">Reset Password</span>
            </div>
        </div>
        <form class="row shadow" action="<?= base_url("user/forgot_password")?>" method="POST">
            <div class="form-group col-md-8 p-2">
                <label for="email">Enter your email</label>
                <input type="email" class="form-control" value="<?= $email?>" name="email" required placeholder="email@zetech.ac.ke" oninput="convertToLowerCase(this)">
            </div>
            <div class="col-md-12 my-2 p-2">
                <button type="submit" class="btn btn-sm btn-secondary mx-2">Submit</button>
            </div>
        </form>
    </div>
    <script>
        function convertToLowerCase(input) {
            input.value = input.value.toLowerCase();
        }

    </script>
</section>