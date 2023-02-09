<?php require_once __DIR__ . "/partials/header.php"; ?>
<?php require_once __DIR__ . "/partials/navbar.php"; ?>
    <div class="container-fluid ">
        <form method="post">
            <div class="p-4 mx-auto mr-4 shadow rounded" style="margin-top: 50px; width: 100%">
                <h2 class="text-center">My School</h2>
                <img src="http://localhost/smsmvcphp2/public/assets/logo.png" class="border border-primary d-block mx-auto rounded-circle" style="width:100px;">
                <h3>Login</h3>
                <input class="form-control <?php if(isset($errors)) {echo "is-invalid";}else {echo "";} ?>" value="<?=get_var('email')?>" type="email" name="email" placeholder="Email" autofocus>
                <br>
                <input class="form-control <?php if(isset($errors)) {echo "is-invalid";}else {echo "";} ?>" value="<?=get_var('password')?>" type="password" name="password" placeholder="Password">
                    <?php if (isset($errors['email'])){ ?>
                        <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                            <?php echo $errors['email']; ?>
                        </div>
                    <?php }?>
                <br>
                <button class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
<?php require_once __DIR__ . "/partials/footer.php"; ?>