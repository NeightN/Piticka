<!-- Header -->
<header>
    <!-- Sign up -->
    <div class="offcanvas offcanvas-end bg-dark text-white" id="profil">
        <div class="offcanvas-header">
            <h1 class="offcanvas-title">Profil</h1>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <hr class="text-white" style="margin:0">
        <div class="offcanvas-body">

        </div>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="#">Homura</a>

            <!-- Buttons for "sign up" and "log in" -->
            <div>
                <button class="btn btn-primary pfp_btn" id="pfp_btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#profil" title="pfp">
                    <img height="24" width="24" src="img/coffee_def.svg" alt="coffe_pfp">
                </button>

                <a class="btn btn-secondary" href="user/logout.php" title="logout">
                    Log out
                </a>
            </div>
        </div>
    </nav>
    <!-- Header background -->
    <div class="wide">
        <div class="col-sm-12">
        </div>
    </div>
</header>