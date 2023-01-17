<style>
    nav ul li a:hover{
        background-color: grey;
        color: white !important;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light p-2">
    <a class="navbar-brand" href="#">
        <img src="http://localhost/smsmvcphp2/public/assets/logo.png" class="" style="width:50px;">
        My School
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link active" href="http://localhost/smsmvcphp2/public">DASHBOARD</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/smsmvcphp2/public/users">USERS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/smsmvcphp2/public/classes">CLASSES</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="http://localhost/smsmvcphp2/public/tests">TESTS</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="http://localhost/smsmvcphp2/public/profile">Profile</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="http://localhost/smsmvcphp2/public">Dashboard</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="http://localhost/smsmvcphp2/public/logout">Logout</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    USER
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Dashboard</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>