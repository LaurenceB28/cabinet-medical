<?php
$styleSheet = 'stylesheet.css';

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    // $patient = Patient::get($id);

    
include __DIR__ .'/../views/templates/header.php'; 
    include __DIR__ .'/../views/appointment/appointment-list.php';  
include __DIR__ .'/../views/templates/footer.php';