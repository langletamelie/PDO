<?php

//instenciation de la variable patient
$patient = NEW patients();

$id = &$patient->id;
$lastname = &$patient->lastname;
$firstname = &$patient->firstname;
$birthdate = &$patient->birthdate;
$phone = &$patient->phone;
$mail = &$patient->mail;




//déclaration des regex du formulaire d'ajout de patient
//déclaration de la regex pour les noms
$regexName = '/^[A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ° \'\-]+$/';
//regex pour le numéro de téléphone (commençant obligatoirement par un 0 et contenant 10 chiffres)
$regexPhoneNumber = '/^0[1-2345679][0-9]{8}/';
//regex pour la date de naissance (aaaa-mm-jj)
$regexBirthDate = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}/';
//regex pour l'adresse mail (autorisation chiffres lettres, obligation de l'@ et .)
$regexMail = '/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/';
//déclaration du tableau d'erreur
$formError = array();

//Si lastname existe , faire un test regex, si c'est valide on stocke la valeur dans $lastname sinon c'est vide
if (isset($_POST['lastname'])) {
    //déclaration de la variable lastname avec le htmlspecialchar
    $lastname = htmlspecialchars($_POST['lastname']);
    if (!preg_match($regexName, $lastname)) {
        //test avec la regex pour vérifier la validité du champs lastname
        $formError['lastname'] = 'La saisie de votre nom est invalide';
    }
    if (empty($lastname)) { // vérifie si le champs du nom est vide 
        //stocker dans le tableau le rapport d'erreur
        $formError['lastname'] = 'Veuillez indiquer votre nom';
    }
}
if (isset($_POST['firstname'])) {
    //déclaration de la variable firstname avec le htmlspecialchar
    $firstname = htmlspecialchars($_POST['firstname']);
    if (!preg_match($regexName, $firstname)) {
        //test avec la regex pour vérifier la validité du champs firstname
        $formError['firstname'] = 'La saisie de votre prénom est invalide';
    }
    if (empty($firstname)) {// vérifie si le champs du prénom est vide 
        //stocker dans le tableau le rapport d'erreur
        $formError['firstname'] = 'Veuillez indiquer votre nom';
    }
}
if (isset($_POST['phone'])) {
    //déclaration de la variable phone avec le htmlspecialchar
    $phone = htmlspecialchars($_POST['phone']);
    $phone = preg_replace("/[^0-9]/", "", $phone);
    if (!preg_match($regexPhoneNumber, $phone)) {
        //test avec la regex pour vérifier la validité du champs phone
        $formError['phone'] = 'La saisie de votre numéro de téléphone est invalide';
    }
    if (empty($phone)) { // vérifie si le champs phone est vide 
        //stocker dans le tableau le rapport d'erreur
        $formError['phone'] = 'Veuillez indiquer votre numéro de téléphone';
    }
}
if (isset($_POST['mail'])) {
    //déclaration de la variable mail avec le htmlspecialchar
    $mail = htmlspecialchars($_POST['mail']);
    if (!preg_match($regexMail, $mail)) {
        //test avec la regex pour vérifier la validité du champs mail
        $formError['mail'] = 'La saisie de votre mail est invalide';
    }
    if (empty($mail)) { // vérifie si le champs mail est vide 
        //stocker dans le tableau le rapport d'erreur
        $formError['mail'] = 'Veuillez indiquer votre mail';
    }
}
if (isset($_POST['birthdate'])) {
    //déclaration de la variable birthdate avec le htmlspecialchar
    $birthdate = htmlspecialchars($_POST['birthdate']);
    if (!preg_match($regexBirthDate, $birthdate)) {
        //test avec la regex pour vérifier la validité du champs date de naissance
        $formError['birthdate'] = 'La saisie de votre date de naissance est invalide';
    }
    if ($birthdate > date('Y-m-d')) {
        $formError['birthdate'] = 'La date de naissance ne peut pas être supérieur à la date actuelle';
    }
    if (empty($birthdate)) { // vérifie si le champs date de naissance est vide 
        //stocker dans le tableau le rapport d'erreur
        $formError['birthdate'] = 'Veuillez indiquer votre date de naissance';
    }
}
if (isset($_POST['submit']) && (count($formError) == 0)) {
    $checkIfPatientExists = $patient->checkIfPatientExist();
    if ($checkIfPatientExists->count == 0) {
        return $patient->addPatient();
    }
}