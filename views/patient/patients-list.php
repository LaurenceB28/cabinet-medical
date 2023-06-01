<div id="results">
    <h3 class="text-center">Bonjour Mr ou Mme</h3>

    <ul>
    <?php if ($firstname) { ?>
            <li><strong>Prénom: </strong><?= $firstname ?></li>
        <?php } ?>
        <?php if ($laststname) { ?>
            <li><strong>Nom de famille : </strong><?= $lastname ?></li>
        <?php } ?>
        <?php if ($birthdate) { ?>
            <li><strong>Date de naissance : </strong><?= date('d.m.Y', strtotime($birthdate)) ?></li>
        <?php } ?>
        <?php if ($phone) { ?>
            <li><strong>Numéro de telephone : </strong><?= $phone ?></li>
        <?php } ?>
        <?php if ($email) { ?>
            <li><strong>Email : </strong><?= $email ?></li>
        <?php } ?>