<!-- Header -->
<header class="sticky-top">
    <!-- Sign up -->
    <div class="offcanvas offcanvas-end bg-dark-coffee text-white" id="signup">
        <div class="offcanvas-header">
            <h1 class="offcanvas-title">Vytvořit účet</h1>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body text-desert-sand">
            <form action="user/register.php" method="POST" class="was-validated">
                <!-- Name -->
                <div class="mb-3 mt-3">
                    <label for="uname" class="form-label">Jméno:</label>
                    <input type="text" class="form-control" id="uname1" placeholder="Jméno" name="uname" required>
                    <div class="valid-feedback">V pořádku.</div>
                    <div class="invalid-feedback">Vyplňte prosím toto pole.</div>
                </div>
                <!-- E-mail -->
                <div class="mb-3">
                    <label for="mail" class="form-label">E-mail:</label>
                    <input type="email" class="form-control" id="mail" placeholder="E-mail" name="mail" required>
                    <div class="valid-feedback">V pořádku.</div>
                    <div class="invalid-feedback">Vyplňte prosím toto pole.</div>
                </div>
                <!-- Password -->
                <div class="mb-3">
                    <label for="pswd" class="form-label">Heslo:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Heslo" name="pswd" required>
                    <div class="valid-feedback">V pořádku.</div>
                    <div class="invalid-feedback">Vyplňte prosím toto pole.</div>
                </div>
                <!-- Check password -->
                <div class="mb-3">
                    <label for="repeat_pswd" class="form-label">Znovu heslo:</label>
                    <input type="password" class="form-control" id="repeat_pswd" placeholder="Heslo" name="repeat_pswd" required>
                    <div class="valid-feedback">V pořádku.</div>
                    <div class="invalid-feedback">Vyplňte prosím toto pole.</div>
                </div>
                <!-- Validation -->
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="myCheck" name="remember" required>
                    <label class="form-check-label" for="myCheck"><em>Přijímám podmínky Homura</em></label>
                    <div class="valid-feedback">V pořádku.</div>
                    <div class="invalid-feedback">Zaškrtněte toto políčko pro pokračování.</div>
                </div>
                <button type="submit" class="btn bg-pale-taupe">Potvrdit</button>
            </form>
        </div>
    </div>


    <!-- Log in -->
    <div class="offcanvas offcanvas-end bg-dark-coffee text-white" id="login">
        <div class="offcanvas-header">
            <h1 class="offcanvas-title">Přihlásit se</h1>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body text-desert-sand">
            <form action="user/login.php" method="POST" class="was-validated">
                <!-- Name -->
                <div class="mb-3 mt-3">
                    <label for="uname2" class="form-label">Jméno:</label>
                    <input type="text" class="form-control" id="uname2" placeholder="Jméno" name="uname" required>
                    <div class="valid-feedback">V pořádku.</div>
                    <div class="invalid-feedback">Vyplňte prosím toto pole.</div>
                </div>
                <!-- Password -->
                <div class="mb-3">
                    <label for="pwd2" class="form-label">Heslo:</label>
                    <input type="password" class="form-control" id="pwd2" placeholder="Heslo" name="pswd2" required>
                    <div class="valid-feedback">V pořádku.</div>
                    <div class="invalid-feedback">Vyplňte prosím toto pole.</div>
                </div>
                <button type="submit" class="btn bg-pale-taupe">Potvrdit</button>
            </form>
        </div>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark-coffee navbar-dark">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="#">Homura</a>

            <!-- Buttons for "sign up" and "log in" -->
            <div>
                <button class="btn bg-desert-sand text-dark-coffee" type="button" data-bs-toggle="offcanvas" data-bs-target="#signup">
                    Sign up
                </button>
                <button class="btn bg-pale-taupe text-dark-coffee" type="button" data-bs-toggle="offcanvas" data-bs-target="#login">
                    Log in
                </button>
            </div>
        </div>
    </nav>
</header>