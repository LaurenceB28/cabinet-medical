<?php
require_once __DIR__ . '/../models/Patient.php';
require_once __DIR__ . '/../config/config.php';
$styleSheet = 'stylesheet.css';
// $add = add()
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        /*Email : nettoyage et validation */
        $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
    
        if (empty($mail)) {
            $error["mail"] = "L'adresse mail est obligatoire!!";
        } else {
            $testEmail = filter_var($mail, FILTER_VALIDATE_EMAIL);
            if (!$testEmail) {
                $error["mail"] = "L'adresse email n'est pas au bon format!!";
            }
            // $isExist = Patient::isExist($mail);
            // if ($isExist) {
            //     $error["mail"] = 'le patient existe déja';
            // }
        }
    
    
        /*Phone : nettoyage et validation */
        $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT));
    
        if (empty($phone)) {
            $error["phone"] = "le numéro est invalide!!";
        } else {
            $testPhone = filter_var($phone, FILTER_VALIDATE_INT);
            if (!$testPhone) {
                $error["phone"] = "le numéro est invalide!!";
            }
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
            } else {
                $birthdateObj = new DateTime($birthdate);
                // Calcul de l'age de l'utilisateur (année courante - année de naissance)
                $age = date('d-m-Y',strtotime($birthdate)) - $birthdateObj->format('d-m-Y');
    
                if ($age > 120 || $age < 0) {
                    $error["birthdate"] = "Votre age n'est pas conforme!";
                }
            }
        }
    
        if (!empty($error)) {
            $patient = new Patient();
            $patient->setFirstname($firstname);
            $patient->setLastname($lastname);
            $patient->setBirthdate($birthdate);
            $patient->setPhone($phone);
            $patient->setMail($mail);
            $isExist = $patient->isExist();
            if ($isExist) {
                $message = 'Ce patient est déja enregistré';
                $block = 1;
            } else {
                $block = 0;
                $isAdded = $patient->add();
                if ($isAdded == true) {
                    $message = 'Le patient est enregistré';
                }
            }
        }
    }
} catch (\Throwable $th) {
    var_dump($th);
}


// header('location: /controllers/add-patientCtrl.php');
// Rendu des vues concernées
include(__DIR__ . '/../views/templates/header.php');

if ($_SERVER["REQUEST_METHOD"] != "POST" || !empty($error)) {
    include(__DIR__ . '/../views/patient/add-patient.php');
} else {
    include(__DIR__ . '/../views/user/display.php');
}
include(__DIR__ . '/../views/templates/footer.php');


// include __DIR__ .'/../views/templates/header.php'; 
//     include __DIR__ .'/../views/patient/add-patient.php';  
// include __DIR__ .'/../views/templates/footer.php';