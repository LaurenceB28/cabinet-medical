<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href=" https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/cerulean/bootstrap.min.css " rel="stylesheet">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <link rel="stylesheet" href="/public/assets/css/home.css">
    <?php
    if (isset($stylesheet)) {
        echo '<link rel="stylesheet" href="/public/assets/css/' . $stylesheet . '"> ';
    }
    ?>
    <title>Cabinet-Médical</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Cabinet Médical</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="/views/home.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Accueil</span>
                            </a>
                        </li>
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <a href="/controllers/add-patientCtrl.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Ajouter un patient</span></a>
                        </li>
                        <li>
                            <a href="/controllers/patient-listCtrl.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Liste des patients</span></a>
                        </li>
                        <li>
                            <a href="/controllers/appointmentCtrl.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Nouveau rendez-vous</span></a>
                        </li>
                        <li>
                            <a href="/controllers/appointment-ListCtrl.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Liste des rendez-vous</span></a>
                        </li>
                    </ul>
                    </li>
                    </ul>
                    <hr>
                </div>
            </div>
            <div class="col py-3">