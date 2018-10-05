<?php
include 'navbar.php';
include'../models/patients.php';
include'../controller/liste-patientsController.php';
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
        <title>Liste des patients</title>
    </head>
    <body id="patientListView">
        <div class="container-fluid">
            <div class="row">
                <p id="patientButton"><a href="viewAjout-patient.php" title="lien vers l'ajout de patient" alt="ajout de patient"><button type="button" class="btn btn-lg">AJOUTER UN NOUVEAU PATIENT</button></a></p>
                <div id="listPatient" class="offset-2 col-8 offset-2">
                    <h1 class="title">Affichage de tous les patients</h1>
                    <!--Création d'un tableau qui affichera les noms, prénoms, date de naissance, mail et numéro de téléphone des patients-->
                    <table class="col-12 text-center">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de naissance</th>
                                <th>Adresse mail</th>
                                <th>Téléphone</th>
                                <th>Profil patient</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($patientList as $patientDetail) { ?>
                                <tr>
                                    <td><?= $patientDetail->lastname ?></td>
                                    <td><?= $patientDetail->firstname ?></td>
                                    <td><?= $patientDetail->birthdate ?></td>
                                    <td><?= $patientDetail->mail ?></td>
                                    <td><?= $patientDetail->phone ?></td>
                                    <td><a href="viewProfil-patient.php?id=<?= $patientDetail->id ?>">PATIENT</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </body>
</html>
