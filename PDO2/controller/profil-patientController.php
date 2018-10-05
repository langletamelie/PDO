<?php
//instanciation de l'objet patient
$patient = NEW patients();

$patient->id = $_GET['id'];
//appel de la méthode displayProfilPatient
$patientProfil = $patient->displayProfilPatient();




