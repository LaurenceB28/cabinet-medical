<?php

$styleSheet = 'stylesheet.css';

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
$patient = Patient::get($id);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
    // On vérifie que ce n'est pas vide
    if (empty($firstname)) {
        $error["firstname"] = "Vous devez entrer un nom!!";
    } else { // Pour les champs obligatoires, on retourne une erreur
        $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
        if (!$isOk) {
            $error["firstname"] = "Le prénom n'est pas au bon format!!";
        } else {
            // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
            if (strlen($firstname) <= 2 || strlen($firstname) >= 70) {
                $error["firstname"] = "La longueur du prénom n'est pas bon";
            }
        }
    }
    /*Lastname : nettoyage et validation*/
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
    // On vérifie que ce n'est pas vide
    if (empty($lastname)) {
        $error["lastname"] = "Vous devez entrer un nom!!";
    } else { // Pour les champs obligatoires, on retourne une erreur
        $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
        if (!$isOk) {
            $error["lastname"] = "Le nom n'est pas au bon format!!";
        } else {
            // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
            if (strlen($lastname) <= 2 || strlen($lastname) >= 70) {
                $error["lastname"] = "La longueur du nom n'est pas bon";
            }
        }
    }

    /*dateHour : nettoyage et validation*/
    $dateHour = trim(filter_input(INPUT_POST, 'dateHour', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($dateHour)) {
        $error["dateHour"] = "l\'heure de rendez-vous n'est pas selectionnée";
    } else {
        $error["dateHour"] = "l\'heure de rendez-vous n'est pas valide";
    }

    /*dateAppointment : nettoyage et validation*/
    $dateAppointment = trim(filter_input(INPUT_POST, 'dateAppointment', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($dateAppointment)) {
        $error["dateAppointment"] = "le jour de rendez-vous n'est pas selectionnée";
    } else {
        $error["dateAppointment"] = "le jour de rendez-vous n'est pas valide";
    }
}
if (empty($error)) {
    $patient = new Patient();
    $patient->setId($id);
    $patient->setFirstname($firstname);
    $patient->setLastname($lastname);
    $isAppointemnt = $patient->appointment();
    if ($isAppointemnt) {
        $message = 'le rendez-vous est confirmée pour le ' . $dateAppointment . 'à ' . $dateHour . '.';
    } else {
        $message = 'le rendez-vous n\'est pas validée';
    }
}






include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/appointment/appointment.php';
include __DIR__ . '/../views/templates/footer.php';
