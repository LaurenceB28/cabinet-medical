<?php
require_once __DIR__ . '/../models/Appointment.php';
require_once __DIR__ . '/../models/Patient.php';
$styleSheet = 'stylesheet.css';


$patientList = Patient::patientList();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idPatients = intval(filter_input(INPUT_POST, 'idPatients', FILTER_SANITIZE_NUMBER_INT));
    /*date: nettoyage et validation*/
    $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($date)) {
        $error["date"] = "le jour de rendez-vous n'est pas selectionnée";
    } else {
        $isOk = filter_var($date, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_DATE . '/')));
        if (!$isOk) {
            $error["date"] = "le jour du rendez-vous n'est pas valide";
        }
    }
    $hour = trim(filter_input(INPUT_POST, 'hour', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($hour)) {
        $error["hour"] = "l\'heure du rendez-vous n'est pas selectionnée";
    } else {
        $isOk = filter_var($hour, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_HOUR . '/')));
        if (!$isOk) {
            $error["hour"] = "l\'heure de rendez-vous n'est pas valide";
        }
    }

    $dateHour = ($date .' '. $hour);
    $appointment = new Appointment();
    $appointment->setIdPatients($idPatients);
    $appointment->setDateHour($dateHour);
    $appointment->add();
}

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/appointment/add-appointment.php';
include __DIR__ . '/../views/templates/footer.php';
