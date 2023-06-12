<div class="container-fluid" id="logo">
        <a class="logo" href="">
            <img src="/public/assets/img/logo.png"> 
        </a>
    </div>
<h3 class="text-center">RDV Patient</h3>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Fiche RDV Patient</h4>
        </div>
        <ul>
            <li class="list-group-item"><span class="bold">Nom : </span><?= $appointmentInfos->lastname ?></li>            
            <li class="list-group-item"><span class="bold">Prénom : </span><?= $appointmentInfos->firstname ?></li>
            <li class="list-group-item"><span class="bold">Date du RDV : </span><?= $appointmentInfos->dateHour ?></li>            
        </ul>
        <div class="card-body">
            <a href="/controllers/modify-appointmentCtrl.php?id=<?= $id ?>" class="btn btn-info">Modifier</a>
        </div>
    </div>
</div>