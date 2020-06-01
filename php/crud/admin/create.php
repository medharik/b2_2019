<?php
session_start();

?>
<?php if (isset($_SESSION['pseudo'])) { ?>
    bienvenue <?= $_SESSION['pseudo'] ?> <br>
    Email : <?= $_SESSION['email'] ?> <br>

<?php } ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nouvel utilisateur</title>
    <?php include("../_css.php"); ?>
</head>

<body>
    <?php include_once("../_menu.php"); ?>
    <div class="container">

        <div class="row">
            <div class="col-md-6 shadow p-3 mx-auto mt-3">

                <form action="store.php" method="post">

                    <fieldset>
                        <legend class="text-primary text-center">Nouveau compte : </legend>
                        <div class="form-group">Login : <label for="login"></label><input type="text" name="login" id="login" class="form-control">

                        </div>
                        <div class="form-group">Mot de passe : <label for="passe"></label>
                            <input type="password" name="passe" id="passe" class="form-control">

                        </div>
                        <div class="form-groupe">Pseudo : <label for="pseudo"></label><input type="text" name="pseudo" id="pseudo" class="form-control">

                        </div>
                        <div class="form-groupe">Role : <label for="role"></label>
                            <select type="text" name="role" id="role" class="form-control">
                                <option value="" selected></option>
                                <option value="admin">Admin</option>
                                <option value="agent">Agent de saisie</option>
                            </select>

                        </div>
                        <div class="form-groupe">Email : <label for="email"></label><input required type="email" name="email" id="email" class="form-control">

                        </div>




                        <button class="btn- btn-primary btn-block col-md-6 mx-auto mt-3">
                            Valider
                        </button>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>

</body>

</html>