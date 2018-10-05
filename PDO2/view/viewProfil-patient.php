<?php
include 'navbar.php';
include'../models/patients.php';
include'../controller/modifyPatientController.php';
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
        <title>Profil du patient</title>
    </head>
    <body id="patientProfilView">
        <!-- si les champs sont remplis et corrects, afficher les variables -->
        <?php if (isset($_POST['submit']) && (count($formError) === 0)) { ?> 
            <p id="ok">Les données modifiées ont été enregistrées</p>           
        <?php } else { ?>   
            <div class="container-fluid">
                <div class="row">
                    <div id="profilPatient" class="col-5">
                        <form action="viewProfil-patient.php?id=<?= $patientProfil->id ?>" method="POST">
                            <div class="form-group">
                                <h1 class="title">INFORMATIONS DU PATIENT SELECTIONNÉ</h1>
                                <!--Création de l'affichage des noms, prénoms, date de naissance, mail et numéro de téléphone du patient sélectionné-->
                                <label>Nom : </label>
                                <input type="text" name="lastname" id="lastname" placeholder="Nom" value="<?= $patientProfil->lastname ?>"/>
                                <p class="text-danger"><?= isset($formError['lastname']) ? $formError['lastname'] : '' ?></p>
                                <label>Prénom : </label>
                                <input type="text" name="firstname" id="firstname" placeholder="Prénom" value="<?= $patientProfil->firstname ?>"/>
                                <p class="text-danger"><?= isset($formError['firstname']) ? $formError['firstname'] : '' ?></p>
                                <label>Date de naissance : </label>
                                <input type="date" name="birthdate" id="birthdate" placeholder="jj/mm/aaaa" value="<?= $patientProfil->birthdate ?>"/>
                                <p class="text-danger"><?= isset($formError['birthdate']) ? $formError['birthdate'] : '' ?></p>
                                <label>Adresse mail : </label>
                                <input type="text" name="mail" id="mail" placeholder="Adresse mail" value="<?= $patientProfil->mail ?>"/>
                                <p class="text-danger"><?= isset($formError['mail']) ? $formError['mail'] : '' ?></p>
                                <label>Téléphone : </label>
                                <input type="text" name="phone" id="phone" placeholder="Téléphone" value="<?= $patientProfil->phone ?>"/>
                                <p class="text-danger"><?= isset($formError['phone']) ? $formError['phone'] : '' ?></p>
                                <input type="submit" name="submit" id="submit" value="ENREGISTRER LES MODIFICATIONS"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </body>
</html>
