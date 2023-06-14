<div class="container-fluid" id="logo">
        <a class="logo" href="">
            <img src="/public/assets/img/logo.png"> 
        </a>
    </div>
<h3 class="text-center">Profil du patient</h3>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Fiche Patient</h4>
        </div>
        <ul>
            <li class="list-group-item"><span class="bold">Nom : </span><?= $patient->lastname ?></li>            
            <li class="list-group-item"><span class="bold">Prénom : </span><?= $patient->firstname ?></li>
            <li class="list-group-item"><span class="bold">Date de naissance : </span><?= date('d/m/Y', strtotime($patient->birthdate)) ?></li>
            <li class="list-group-item"><span class="bold">Tel : </span><?= $patient->phone ?></li>
            <li class="list-group-item"><span class="bold">Email : </span><?= $patient->mail ?></li>
        </ul>
        <div class="card-body">
            <a href="/controllers/updatePatientCtrl.php?id=<?= $id ?>" class="btn btn-info">Modifier</a>
        </div>
    </div>
</div>