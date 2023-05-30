<?php
?>

<form>
    <h2>Formulaire du patient</h2>
    <div class="mb-3">
        <label for="lastName" class="form-label">Votre Nom</label>
        <input type="text" class="form-control" placeholder="Nom" aria-label="First name">
    </div>
    <div class="mb-3">
        <label for="firstName" class="form-label">Votre Prénom</label>
        <input type="text" class="form-control" placeholder="Prénom" aria-label="Last name">
    </div>
    <div class="mb-3">
        <input type="date" name="birthdate" id="birthdate" value="<?= htmlentities($birthdate ?? '') ?>" title="La date de naissance n' est pas au format attendu" placeholder="Entrez votre date de naissance" class="form-control <?= isset($error['birthdate']) ? 'errorField' : '' ?>" autocomplete="bday" aria-describedby="birthdateHelp" min="<?= (date('Y') - 120) . date('-m-d') ?>" max="<?= date('Y-m-d') ?>">
        <small id="birthdateHelp" class="form-text error"><?= $error['birthdate'] ?? '' ?></small>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Votre Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>