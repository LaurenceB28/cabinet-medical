<?php
$styleSheet = 'stylesheet.css';
include(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/patient/add-patient.php');
include(__DIR__ . '/../views/templates/footer.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){


                /*Email : nettoyage et validation */

$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

    if (empty($email)) {
        $error["email"] = "L'adresse mail est obligatoire!!";
    } else {
        $testEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$testEmail) {
            $error["email"] = "L'adresse email n'est pas au bon format!!";
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
    $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_NUMBER_INT);
    if (!empty($birthdate)) {
        $isOk = filter_var($birthdate, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_DATE . '/']]);
        if (!$isOk) {
            $error["birthdate"] = "La date entrée n'est pas valide!";
        } else {
            $birthdateObj = new DateTime($birthdate);
            // Calcul de l'age de l'utilisateur (année courante - année de naissance)
            $age = date('Y') - $birthdateObj->format('Y');

            if ($age > 120 || $age < 0) {
                $error["birthdate"] = "Votre age n'est pas conforme!";
            }
        }
    }
}

// Rendu des vues concernées
include(__DIR__ . '/../views/templates/header.php');

if ($_SERVER["REQUEST_METHOD"] != "POST" || !empty($error)) {
    include(__DIR__ . '/../views/patient/add-patient.php');
} else {
    include(__DIR__ . '/../views/user/display.php');
}

include(__DIR__ . '/../views/templates/footer.php');