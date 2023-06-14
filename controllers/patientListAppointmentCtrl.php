<?php
require_once __DIR__ . '/../models/Appointment.php';
require_once __DIR__ . '/../models/Patient.php';
$styleSheet = 'stylesheet.css';

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
$appointmentInfos = Appointment::appointmentInfo($id);





include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/appointment/patientListAppointment.php';
include __DIR__ . '/../views/templates/footer.php';
