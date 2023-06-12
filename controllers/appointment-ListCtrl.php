<?php
require_once __DIR__ . '/../models/Appointment.php';
require_once __DIR__ . '/../models/Patient.php';
$styleSheet = 'stylesheet.css'; 

$appointmentsList = Appointment::appointmentsList();
// $patientList = Patient::patientList();





include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/appointment/appointment-list.php';
include __DIR__ . '/../views/templates/footer.php';
