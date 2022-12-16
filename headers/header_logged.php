<!-- Header -->
<header class="sticky-top">
    <nav class="navbar bg-dark-coffee">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand text-white" href="#">Homura</a>
            <div class="d-flex align-items-center">

                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" id="navbarDropdownMenuAvatar" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="img/coffee_def.svg" class="rounded-circle" height="50" alt="avatar" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">My profile</a>
                        </li>
                        <?php
                        if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                            echo '<li><a class="dropdown-item" href="admin.php">Admin</a></li>';
                        }
                        ?>
                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <!-- admin -->

                        <li>
                            <a class="dropdown-item" href="user/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>