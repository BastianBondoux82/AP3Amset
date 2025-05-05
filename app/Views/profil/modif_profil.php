<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

<?php echo 'Page modification profil'; ?>

<form method="post" action=" <?= url_to('update_profil') ?>">
    <fieldset>
        <legend>Modification profil</legend>
        <label for="id_profil"></label>
        <input id="ID_PROFIL" name="ID_PROFIL" type="hidden" value="<?=$profil['ID_PROFIL']?>">
        <label for="intitule profil">Intitule profil</label>
        <input id="INTITULE_PROFIL" name="INTITULE_PROFIL" type="text" value="<?=$profil['INTITULE_PROFIL']?>">
        <input type="submit" value="Modifier">
        <input type="reset" value="Vider">
    </fieldset>
</form>


<?= $this->endSection() ?>