<?php use smsmvcphp2\views\View; ?>

<?php require_once __DIR__ . "/partials/header.php"; ?>
<?php require_once __DIR__ . "/partials/navbar.php"; ?>

    <div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
        <?php View::make('partials/crumbs', ['crumbs'=>$crumbs])?>

        <div class="card-group justify-content-center">

            <form method="post">
                <h3>Add New School</h3>
                <input autofocus class="form-control <?php if(isset($errors["school"])) {echo "is-invalid";}else {echo "";} ?>" value="<?=get_var('school')?>" type="text" name="school" placeholder="School Name"><br><br>
                    <?php if (isset($errors['school'])){ ?>
                        <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                            <?php echo $errors['school'][0]; ?>
                        </div>
                    <?php }?>
                <input class="btn btn-primary float-end" type="submit" value="Create">
                <a href="http://localhost/smsmvcphp2/public/schools">
                    <input class="btn btn-danger" type="button" value="Cancel">
                </a>
            </form>
        </div>



    </div>

<?php require_once __DIR__ . "/partials/footer.php"; ?>