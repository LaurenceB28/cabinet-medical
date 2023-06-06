<?php
// $error = null;
$birthdate = date('l j F Y');
setlocale(LC_TIME, 'fra.UTF-8');
?>
<form method="post" novalidate>
    <h2>Ajouter un patient</h2>
    <div class="mb-3">
        <label for="lastName" class="form-label">Votre Nom</label>
        <input type="text" name="lastname" class="form-control" placeholder="Nom" aria-label="Firstname" maxlength="25" required>
    </div>
    <div class="mb-3">
        <label for="firstName" class="form-label">Votre Prénom</label>
        <input type="text" name="firstname" class="form-control" placeholder="Prénom" aria-label="Lastname" maxlength="25" required>
    </div>
    <div class="mb-3">
        <input type="date" name="birthdate" id="birthdate" value="<?= htmlentities($birthdate ?? '') ?>" title="La date de naissance n' est pas au format attendu" placeholder="Entrez votre date de naissance" class="form-control <?= isset($error['birthdate']) ? 'errorField' : '' ?>" autocomplete="bday" aria-describedby="birthdateHelp" min="01-01-1920" max="<?= date('l j F Y',strtotime($birthdate)) ?>" required>
        <small id="birthdateHelp" name="birthdate" class="form-text error"><?= $error['birthdate'] ?? '' ?></small>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Votre téléphone</label><br>
        <input type="text" id="phone" name="phone" placeholder="phone" aria-label="phone" max="25">
    </div>
    <div class="mb-3">
        <label for="exampleInputMail1" class="form-label">Votre Email</label>
        <input type="mail" name="mail" id="exampleInputEmail1" placeholder="mail" aria-describedby="mailHelp" maxlength="25" value="<?= htmlentities($email ?? '') ?>" title="L'email existe déja" class="form-control<?= isset($error['mail']) ? 'errorField' : '' ?>" required>
        <small id="mailHelp" class="form-text error"><?= $error['mail'] ?? '' ?></small>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
    <?php $error = null; ?>

    <?php
    if(isset($block)){
    if ($block == 1) : ?>
        <div class="alert alert-danger"><?= $message ?? '' ?></div>
    <?php else : ?>
        <div class="alert alert-success"><?= $message ?? '' ?>
        </div>
        
    <?php endif ?>
    <?php } ?>
    </form>









