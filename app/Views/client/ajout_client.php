<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

<?php echo 'Page nouveau client';
// var_dump($_);
?>

<form method="post" action=" <?= url_to('create_client') ?>">
    <fieldset>
        <legend>Ajout client</legend>
        <label for="raison sociale">Raison Social</label>
        <input id="raison_sociale" name="RAISON_SOCIAL" type="text" required /><br>
        <label for="contact (nom prenom)">Contact (nom prenom)</label>
        <input id="contact" name="CONTACT" type="text" required/><br>
        <label for="contact email">Email Client</label>
        <input id="mail" name="EMAIL_CLIENT" type="text" required/><br>
        <label for="telephone">Telephone Client</label>
        <input id="tel" name="NUM_TELEPHONE_CLIENT" type="text" required maxlength="10"/><br>
        <label for="adresse_client">Adresse Client</label>
        <input id="adresse" name="ADRESSE_CLIENT" type="text" required/><br>
        <label for="code postal">Code Postal</label>
        <input id="cp" name="CODE_POSTAL_CLIENT" type="text" required/><br>
        <label for="ville">Ville</label>
        <input id="ville" name="VILLE_CLIENT" type="text" required/><br>
        <label for="avatar">Photo de profil</label>
        <input type="file" id="photo" name="PROFIL_CLIENT" accept="image/png, image/jpeg" required><br>
        <input type="submit" value="Ajouter">
        <input type="reset" value="Vider">
    </fieldset>
</form>
<?= $this->endSection() ?>