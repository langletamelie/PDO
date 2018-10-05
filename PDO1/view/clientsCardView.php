<?php
include'../models/clients.php';
include'../controller/clientsCardsController.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../assets/css/style.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <title>Exercice PDO</title>
    </head>
    <body>
         <a id="home" class="btn btn-light btn-lg" role="button" href="../index.php">HOME</a>  
        <h1 class="title">Clients ayant une carte de fidélité</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="firstTest offset-4 col-4 text-center">
                    <!--Création d'un tableau qui affichera les noms et prénoms des clients ayant une carte de fidélité-->
                    <table class="col-12 text-center">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>prénom</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clientList as $clientDetail) { ?>
                                <tr>
                                    <td><?= $clientDetail->lastName ?></td>
                                    <td><?= $clientDetail->firstName ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>