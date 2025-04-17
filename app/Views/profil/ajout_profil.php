<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

<?php echo 'Page nouveau profil';
// var_dump($_);
?>

<form method="post" action=" <?= url_to('create_profil') ?>">
    <fieldset>
        <legend>Ajout profil</legend>
        <label for="intitule profil">Intitule profil</label>
        <input id="intitule_profil" name="INTITULE_PROFIL" type="text" required /><br>
        <input type="submit" value="Ajouter">
        <input type="reset" value="Vider">
    </fieldset>
</form>

<?= $this->endSection() ?>