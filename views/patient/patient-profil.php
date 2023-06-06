<h3 class="text-center">Profil du patient</h3>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Fiche Patient</h4>
        </div>
        <ul>
            <li class="list-group-item">Nom:<span class="bold"></span><?= $patient->lastname ?></li>
            <li class="list-group-item">Prénom:<span class="bold"></span><?= $patient->firstname ?></li>
            <li class="list-group-item">Date de naissance:<span class="bold"></span><?= $patient->birthdate ?></li>
            <li class="list-group-item">Tel:<span class="bold"></span><?= $patient->phone ?></li>
            <li class="list-group-item">Email:<span class="bold"></span><?= $patient->mail ?></li>
        </ul>
    </div>
</div>