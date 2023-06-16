<?php
require_once __DIR__ . '/../models/Appointment.php';
require_once __DIR__ . '/../models/Patient.php';
$styleSheet = 'stylesheet.css'; 

if(isset($_GET['id'])){
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $deleteAppointment = Appointment::deleteAppointment($id);
    var_dump($deleteAppointment);
}
$appointmentsList = Appointment::appointmentsList();





include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/appointment/appointment-list.php';
include __DIR__ . '/../views/templates/footer.php';
