<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

<?php echo 'Page modification client';

?>

<form method="post" action=" <?= url_to('update_client') ?>">
    <fieldset>
        <legend>Modifier client</legend>
        <label for="id_client">ID</label>
        <input id="ID_CLIENT" name="ID_CLIENT" type="hidden" value="<?=$client['ID_CLIENT']?>">
        <label for="raison sociale">Raison Social</label>
        <input id="raison sociale" name="RAISON_SOCIAL" type="text" value="<?=$client['RAISON_SOCIAL']?>" required /><br>
        <label for="contact (nom prenom)">Contact (nom prenom)</label>
        <input id="contact" name="CONTACT" type="text" value="<?=$client['CONTACT']?>" required/><br>
        <label for="contact email">Email Client</label>
        <input id="mail" name="EMAIL_CLIENT" type="text" value="<?=$client['EMAIL_CLIENT']?>" required/><br>
        <label for="telephone">Telephone Client</label>
        <input id="tel" name="NUM_TELEPHONE_CLIENT" type="text" required maxlength="10" value="<?=$client['NUM_TELEPHONE_CLIENT']?>"/><br>
        <label for="adresse_client">Adresse Client</label>
        <input id="adresse" name="ADRESSE_CLIENT" type="text" required value="<?=$client['ADRESSE_CLIENT']?>"/><br>
        <label for="code postal">Code Postal</label>
        <input id="cp" name="CODE_POSTAL_CLIENT" type="text" required value="<?=$client['CODE_POSTAL_CLIENT']?>"/><br>
        <label for="ville">Ville</label>
        <input id="ville" name="VILLE_CLIENT" type="text" required value="<?=$client['VILLE_CLIENT']?>"/><br>
        <label for="avatar">Photo de profil</label>
        <input type="file" id="photo" name="PROFIL_CLIENT" accept="image/png, image/jpeg"  value="<?=$client['PHOTO_CLIENT']?>"><br>
        <input type="submit" value="Modifier">
        <input type="reset" value="Vider">

    </fieldset>
</form>
<?= $this->endSection() ?>