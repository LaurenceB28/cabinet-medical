<?php
require_once __DIR__ . '/../models/Patient.php';
$styleSheet = 'stylesheet.css';

try {
    if (empty($error)) {
        $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
        // $id=$_GET['id'];
        $patient = new Patient;
        $update = $patient -> updatePatient($id);
        // $patient = Patient::updatePatient($id);
        $patient->setFirstname($firstname);
        $patient->setLastname($lastname);
        $patient->setBirthdate($birthdate);
        $patient->setPhone($phone);
        $patient->setMail($mail);
    }
    // if ($sth->execute()) {
    //     $message = 'Les modifications ont bien été enregistrées';
    // }
} catch (\Throwable $th) {
    //throw $th;
}

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/patient/updatePatient.php');
include(__DIR__ . '/../views/templates/footer.php');
