<?php
require_once __DIR__ . '/../models/Appointment.php';
require_once __DIR__ . '/../models/Patient.php';
$styleSheet = 'stylesheet.css';


$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
$patientList = Patient::patientList();
$appointmentInfo = Appointment::appointmentInfo($id);
// $appointmentsList = Appointment::appointmentsList();

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
    $dateHour = ($date . ' ' . $hour);
    if (empty($error)) {
        $modify = new Appointment();
        $modify->setId($id);
        $modify->setIdPatients($idPatients);
        $modify->setDateHour($dateHour);
        $isUpdated = $modify->modify();
        if ($isUpdated) {
            $message = 'La modification du RDV est enregistré';
        } else {
            $message = 'La modification du RDV n\'a pas aboutie';
        }
        // $message = ($isUpdated) ? 'La modification est enregistré' : 'La modification n\'a pas aboutie';
    }
}


include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/appointment/modify-appointment.php';
include __DIR__ . '/../views/templates/footer.php';
