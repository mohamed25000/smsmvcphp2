<?php require_once __DIR__ . "/partials/header.php"; ?>
<?php require_once __DIR__ . "/partials/navbar.php"; ?>
    <div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px">
        <?php require_once __DIR__ . "/partials/crumbs.php"; ?>
        <div class="card-group justify-content-center">
            <?php foreach ($rows as $row): ?>
                <div class="card m-2 shadow-sm" style="max-width: 14rem;min-width: 14rem">
                    <div class="card-header">User profile</div>
                    <img src="http://localhost/smsmvcphp2/public/assets/user_female.jpg" class="card-img-top mx-auto" alt="card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['firstname'] ?> <?= $row['lastname'] ?></h5>
                        <p class="card-text"><?= str_replace("_", " ", $row['rank']) ?></p>
                        <a href="#" class="btn btn-primary">Profile</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php require_once __DIR__ . "/partials/footer.php"; ?>