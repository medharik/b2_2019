<?php
session_start();
if (isset($_SESSION['pseudo'])) { ?>
    bienvenue <?= $_SESSION['pseudo'] ?> <br>
    Email : <?= $_SESSION['email'] ?> <br>

    <?php } ?><?php
                include("../modeles.php");
                $users = all("users");
                $notice = "";
                $classe = "d-none";
                if (isset($_GET['op'])) {
                    $classe = "d-block mt-3";
                    $op = $_GET['op'];
                    if ($op == 'del') {
                        $notice = "Suppression effectuee avec succes ";
                    }
                    if ($op == 'upd') {
                        $notice = "Modification effectuee avec succes ";
                    }
                    if ($op == 'store') {
                        $notice = "Creation effectuee avec succes ";
                    }
                    if ($op == 'existe') {
                        $notice = "cet utilisateur existe deja ";
                    }
                }
                ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>nouveau user</title>
        <?php include("../_css.php"); ?>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    </head>

    <body>
        <?php include_once("../_menu.php"); ?>
        <div class="container">
            <a href="http://localhost:83/sites/b2_2019/php/crud/admin/create.php" class="btn btn-primary float-right my-3">Nouveau</a>


            <div class="alert alert-info <?= $classe ?>" style="clear:both"><?= $notice ?></div>
            <table class="table table-striped" id="houcine">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>login</th>
                        <th>mot de passe </th>
                        <th>pseudo </th>
                        <th>role </th>
                        <th>email </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($users as $p) { ?>
                        <tr>
                            <td><?= $p['id'] ?></td>
                            <td><?= $p['login'] ?></td>
                            <td><?= $p['passe'] ?></td>
                            <td><?= $p['pseudo'] ?></td>
                            <td><?= $p['role'] ?></td>
                            <td><?= $p['email'] ?></td>
                            <td> <a onclick="return confirm('Supprimer ?')" href="delete.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-danger">Supprimer</a>
                                <a href="edit.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-warning">Modifier</a>
                                <a href="show.php?ounacer=<?= $p['id'] ?>" class="btn btn-sm btn-info">Consulter</a></td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>

            <hr>


        </div>

        <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#houcine').DataTable(

                    {
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
                        }
                    }
                );
            });
            ////cdn.datatables.net/plug-ins/1.10.20/i18n/French.json
        </script>

    </html>