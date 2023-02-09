<?php require_once __DIR__ . "/partials/header.php"; ?>
<?php require_once __DIR__ . "/partials/navbar.php"; ?>

<div class="container-fluid ">
    <div class="p-4 mx-auto mr-4 shadow rounded" style="margin-top: 50px;width:100%;max-width: 340px;">
        <h2 class="text-center">My School</h2>
        <img src="http://localhost/smsmvcphp2/public/assets/logo.png" class="border border-primary d-block mx-auto rounded-circle" style="width:100px;">
        <h3>Add User</h3>
        <form method="post" action="register">
            <input class="my-2 form-control <?php if(isset($errors["firstname"])) {echo "is-invalid";}else {echo "";} ?>" value="<?=get_var('firstname')?>" type="firstname" name="firstname" placeholder="First Name" >
                <?php if (isset($errors['firstname'])){ ?>
                    <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                        <?php echo $errors['firstname'][0]; ?>
                    </div>
                <?php }?>
            <input class="my-2 form-control <?php if(isset($errors["lastname"])) {echo "is-invalid";}else {echo "";} ?>" value="<?=get_var('lastname')?>" type="lastname" name="lastname" placeholder="Last Name" >
                <?php if (isset($errors['lastname'])){ ?>
                    <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                        <?php echo $errors['lastname'][0]; ?>
                    </div>
                <?php }?>
            <input class="my-2 form-control <?php if(isset($errors["email"])) {echo "is-invalid";}else {echo "";} ?>" value="<?=get_var('email')?>" type="email" name="email" placeholder="Email" >
                <?php if (isset($errors['email'])){ ?>
                    <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                        <?php echo $errors['email'][0]; ?>
                    </div>
                <?php }?>
            <select class="my-2 form-control <?php if(isset($errors["gender"])) {echo "is-invalid";}else {echo "";} ?>" name="gender">
                <option <?=get_select('gender','')?> value="">--Select a Gender--</option>
                <option <?=get_select('gender','male')?> value="male">Male</option>
                <option <?=get_select('gender','female')?> value="female">Female</option>
            </select>
                <?php if (isset($errors['gender'])){ ?>
                    <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                        <?php echo $errors['gender'][0]; ?>
                    </div>
                <?php }?>
            <select class="my-2 form-control <?php if(isset($errors["rank"])) {echo "is-invalid";}else {echo "";} ?>" name="rank">
                <option <?=get_select('rank','')?> value="">--Select a Rank--</option>
                <option <?=get_select('rank','student')?> value="student">Student</option>
                <option <?=get_select('rank','reception')?> value="reception">Reception</option>
                <option <?=get_select('rank','lecturer')?> value="lecturer">Lecturer</option>
                <option <?=get_select('rank','admin')?> value="admin">Admin</option>
                <option <?=get_select('rank','super-admin')?> value="super_admin">Super Admin</option>
            </select>
                <?php if (isset($errors['rank'])){ ?>
                    <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                        <?php echo $errors['rank'][0]; ?>
                    </div>
                <?php }?>
            <input class="my-2 form-control <?php if(isset($errors["password"])) {echo "is-invalid";}else {echo "";} ?>" value="<?=get_var('password')?>" type="text" name="password" placeholder="Password">
                <?php if (isset($errors['password'])){ ?>
                    <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                        <?php echo $errors['password'][0]; ?>
                    </div>
                <?php }?>
            <input class="my-2 form-control<?php if(isset($errors["password_confirmation"])) {echo "is-invalid";}else {echo "";} ?>" value="<?=get_var('password_confirmation')?>" type="text" name="password_confirmation" placeholder="Retype Password">
                <?php if (isset($errors['password_confirmation'])){ ?>
                    <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                        <?php echo $errors['password_confirmation'][0]; ?>
                    </div>
                <?php }?>
            <br>
            <button class="btn btn-primary float-end">Add User</button>
            <button class="btn btn-danger">Cancel</button>
        </form>
    </div>
</div>
<?php require_once __DIR__ . "/partials/footer.php"; ?>
