<!-- Header -->
<header class="sticky-top">
    <nav class="navbar bg-dark-coffee">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand text-white" href="#">Homura</a>
            <div class="d-flex align-items-center">

                <div class="dropdown">
                    <a class="dropdown-toggle" id="navbarDropdownMenuAvatar" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                        if (isset($_SESSION['page']) && $_SESSION['page'] == "index2.php") {
                            echo '<img src="img/coffee_def.svg" class="rounded-circle border" height="50" alt="avatar" loading="lazy" />';
                        }
                        if (isset($_SESSION['page']) && $_SESSION['page'] == "profile.php") {
                            echo '<img src="../img/coffee_def.svg" class="rounded-circle border" height="50" alt="avatar" loading="lazy" />';
                        }
                        ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <?php
                        if (isset($_SESSION['page']) && $_SESSION['page'] == "index2.php") {
                            echo '<li><a class="dropdown-item" href="user/profile.php">My profile</a></li>';
                        }
                        ?>
                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <?php
                        if (isset($_SESSION['page']) && $_SESSION['page'] == "index2.php") {
                            echo '<a class="dropdown-item" href="user/logout.php">Logout</a>';
                        }
                        if (isset($_SESSION['page']) && $_SESSION['page'] == "profile.php") {
                            echo '<a class="dropdown-item" href="../user/logout.php">Logout</a>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>