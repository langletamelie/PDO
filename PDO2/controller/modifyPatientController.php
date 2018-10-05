<?php

$patient = NEW patients();
if(isset($_GET['id'])){
$patient->id = $_GET['id'];
}
$lastname = &$patient->lastname;
$firstname = &$patient->firstname;
$birthdate = &$patient->birthdate;
$phone = &$patient->phone;
$mail = &$patient->mail;


//déclaration de la regex pour les noms
$regexName = '/^[A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ° \'\-]+$/';
//regex pour le numéro de téléphone (commençant obligatoirement par un 0 et contenant 10 chiffres)
$regexPhoneNumber = '/^0[1-68][0-9]{8}/';
//regex pour la date de naissance (aaaa-mm-jj)
$regexBirthDate = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}/';
//regex pour l'adresse mail (autorisation chiffres lettres, obligation de l'@ et .)
$regexMail = '/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/';
//déclaration du tableau d'erreur
$formError = array();




//conditions à vérifier avant de pouvoir modifier les données du patient

if (isset($_POST['submit'])) {
    if (!empty($_POST['lastname'])) {
        if (preg_match($regexName, $_POST['lastname'])) {
            $patient->lastname = htmlspecialchars($_POST['lastname']);
        } else {
            $formError['lastname'] = 'La modification du nom est invalide';
        }
    }

    if (!empty($_POST['firstname'])) {
        if (preg_match($regexName, $_POST['firstname'])) {
            $patient->firstname = htmlspecialchars($_POST['firstname']);
        } else {
            $formError['firstname'] = 'La modification du prénom est invalide';
        }
    }

    if (!empty($_POST['birthdate'])) {
        if (preg_match($regexBirthDate, $_POST['birthdate'])) {
            ($birthdate > date('Y-m-d'));
            $patient->birthdate = htmlspecialchars($_POST['birthdate']);
        } else {
            $formError['birthdate'] = 'La modification de la date de naissance est invalide';
        }
    }

    if (!empty($_POST['phone'])) {
        if (preg_match($regexPhoneNumber, $_POST['phone'])) {
            $patient->phone = htmlspecialchars($_POST['phone']);
            $phone = preg_replace("/[^0-9]/", "", $phone);
        } else {
            $formError['phone'] = 'La modification du numéro de téléphone est invalide';
        }
    }

    if (!empty($_POST['mail'])) {
        if (preg_match($regexMail, $_POST['mail'])) {
            $patient->mail = htmlspecialchars($_POST['mail']);
        } else {
            $formError['mail'] = 'La modification du mail est invalide';
        }
    }

    if (count($formError) == 0) {
        $updateProfilPatient = $patient->changeProfilPatient();
    }
}
$patientProfil = $patient->displayProfilPatient();
?>