<?php
require_once __DIR__ . '/../models/Patient.php';
require_once __DIR__ . '/../models/Appointment.php';

$styleSheet = 'stylesheet.css';

try {
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Si une recherche est effectuée grâce à la methode POST//
    /*Search : nettoyage et validation*/
    $search = trim(filter_input(INPUT_POST, 'search', FILTER_SANITIZE_SPECIAL_CHARS));
    /* affiche la recherche */
    $patientList = Patient::search($search);


}else{
    /*sinon revient sur la liste patient*/
    $patientList = Patient::patientList();

}
/* suppression du patient et des rdvs du patient */
    if (isset($_GET['id'])) {
        $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
        $deleteAppointment = Appointment::deleteAll($id);
        $deletePatient = Patient::deletePatient($id);
    }

/* pagination */
$pagination = Patient::pagination($page);
// $offset
// $limit = 10;
// $page
// $nbrTotal = ceil($total_results/$limit);
// $nbPages
// if (!isset($_GET['page'])) {
//     $page = 1;
// } else{
//     $page = (int)$_GET['page'];
// }
 // $nbrPages = nbres de patients total divisés par le nb de patient par page
 $nbrPages = $nbrTotal / 10;
 $nbrTotal = ; 


} catch (\Throwable $th) {
    var_dump($th);
}



include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/patient/patients-list.php');
include(__DIR__ . '/../views/templates/footer.php');
