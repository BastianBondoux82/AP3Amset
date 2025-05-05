<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<script>
    function validateForm() {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        let checkedOne = Array.prototype.slice.call(checkboxes).some(x => x.checked);
        if (!checkedOne) {
            alert("Please select at least one checkbox.");
            return false;
        }
        // return url_to('create_salarie');
        var_dump($_POST);
        $salarieFiles = mysql_real_escape_string($_FILES);
        $salarieData = mysql_real_escape_string(file_get_contents($_FILES));
        var_dump($salarieData);
    }
</script>

<div class="fcontent">
    <form method="post" onsubmit="return validateForm()">
        <fieldset>
            <legend>Ajout salarié</legend>
            <label for="nom">Nom</label>
            <input class="intitule" id="nom" name="NOM" type="text" required><br>

            <label for="prenom">Prénom</label>
            <input class="intitule" id="prenom" name="PRENOM" type="text" required><br>

            <label for="mail">Email</label>
            <input class="intitule" id="mail" name="EMAIL_SALARIE" type="text" required><br>

            <label for="telephone">Telephone</label>
            <input class="intitule" id="telephone" name="NUM_TELEPHONE_SALARIE" type="tel" min="10" max="10" required><br>



            <label for="adresse">Adresse</label>
            <input class="intitule" id="adresse" name="ADRESSE_SALARIE" type="text" required><br>

            <label for="ville">Ville</label>
            <input class="intitule" id="ville" name="VILLE_SALARIE" type="text" required><br>

            <label for="cp">Code_Postal</label>
            <input class="intitule" id="cp" name="CODE_POSTAL_SALARIE" type="text" required><br>

            <label for="genre-select">Genre:</label>
            <select name="CIVILITE" id="genre-select" required>
                <option value="genre">Genre</option>
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select><br>
        </fieldset>
        <!-- <fieldset>
            <legend>Photo</legend>
            <input type="file" id="photo" name="PHOTO_SALARIE" /><br>
        </fieldset> -->
        <fieldset>

            <legend>Selectioner les profils</legend>
            <?php

            foreach ($listeProfil as $profil) {
                echo '<input type="checkbox" name="profils[]" value=' . $profil['ID_PROFIL'] . '>' . $profil['INTITULE_PROFIL'] . '<br>';
            }
            ?>
            <br>
            <button><input type="submit" value="Créer"></button>
            <button><input type="reset" value="Vider"></button>
        </fieldset>
    </form>
    <a href=<?= url_to("page_salarie") ?>><button>Retour</button></a>
</div>
<?= $this->endSection() ?>