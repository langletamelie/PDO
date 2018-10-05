<?php
include 'navbar.php';
include '../models/appointments.php';
include '../models/patients.php';
include '../controller/rendezvousController.php';
include '../controller/liste-patientsController.php';
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
        <title>Ajout de rendez-vous</title>
    </head>
    <body id="addAppointmentView">
        <div class="container-fluid">
            <div class="row">
                <div id="rdvBox" class="offset-2 col-8 offset-2">
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="patientSelect">PATIENT</label>
                            <select name="patientSelect" id="patientSelect">
                                <option selected disabled>---</option>
                                <?php foreach ($patientList as $patientDetail) { ?>
                                    <option value="<?= $patientDetail->id ?>"><?= $patientDetail->lastname . ' ' . $patientDetail->firstname . ' ' . $patientDetail->phone ?></option>
                                <?php } ?>
                            </select>
                            <p class="text-danger"><?= isset($formError['patientSelect']) ? $formError['patientSelect'] : '' ?></p>
                            <label for="rdvDate">DATE DU RDV</label>
                            <input type="date" name="dateAppointment" id="dateAppointment" value="<?= isset($dateAppointment) ? $dateAppointment : '' ?>"/>
                            <p class="text-danger"><?= isset($formError['dateApp']) ? $formError['dateApp'] : '' ?></p>
                            <label for="rdvTime">HEURE DU RDV</label>
                            <input type="time" name="timeAppointment" id="timeAppointment" value="<?= isset($timeAppointment) ? $timeAppointment : '' ?>"/>
                            <p class="text-danger"><?= isset($formError['timeApp']) ? $formError['timeApp'] : '' ?></p>
                            <input type="submit" name="submit" id="submit" value="VALIDER LE RENDEZ VOUS"/>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
