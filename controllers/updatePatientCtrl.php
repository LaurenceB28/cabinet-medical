<?php
require_once __DIR__ . '/../models/Patient.php';
$styleSheet = 'stylesheet.css';

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /*Email : nettoyage et validation */
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));

    if (empty($mail)) {
        $error["mail"] = "L'adresse mail est obligatoire!!";
    } else {
        $testEmail = filter_var($mail, FILTER_VALIDATE_EMAIL);
        if (!$testEmail) {
            $error["mail"] = "L'adresse email n'est pas au bon format!!";
        }


        /*Phone : nettoyage et validation */
        $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT));

        if (empty($phone)) {
            $error["phone"] = "le numéro est obligatoire!!";
        }


        /*Firstname : nettoyage et validation*/
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
        /* birthdate : Nettoyage et validation */
        $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($birthdate)) {
            $isOk = filter_var($birthdate, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_DATE . '/']]);
            if (!$isOk) {
                $error["birthdate"] = "La date entrée n'est pas valide!";
            }
        }

        if (empty($error)) {
            $patient = new Patient();
            $patient->setId($id);
            $patient->setFirstname($firstname);
            $patient->setLastname($lastname);
            $patient->setBirthdate($birthdate);
            $patient->setPhone($phone);
            $patient->setMail($mail);
            $isUpdated = $patient->update();
            if ($isUpdated == true) {
                $message = 'les modifications ont bien été enregistrées';
            } else {
                $message = 'modifications non enregistrées';
            }
            // ou $message = ($isUpdated == true) ? 'les modifications ont bien été enregistrées' : 'modifications non enregistrées';
        }
    }
}
$patient = Patient::get($id);


include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/patient/updatePatient.php');
include(__DIR__ . '/../views/templates/footer.php');
