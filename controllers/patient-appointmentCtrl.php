<?php
require_once __DIR__ . '/../models/Appointment.php';
require_once __DIR__ . '/../models/Patient.php';
$styleSheet = 'stylesheet.css';

try {
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $appointmentInfos = Appointment::appointmentInfos($id);
    if ($appointmentInfos == false) {
        throw new Exception('le patient n\'a pas été trouvé');
    }
} catch (\Throwable $th) {
    
    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/templates/error.php';
    include __DIR__ . '/../views/templates/footer.php';

}





include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/appointment/patient-appointment.php';
include __DIR__ . '/../views/templates/footer.php';
