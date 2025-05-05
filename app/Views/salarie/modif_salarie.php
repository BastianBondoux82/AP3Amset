<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<div class="fcontent">
    <form method="post" action="<?= url_to('update_salarie') ?>">
        <fieldset>
            <legend>Modifier salarie</legend>
            <input id="ID_SALARIE" name="ID_SALARIE" type="hidden" value="<?= $salarie['ID_SALARIE'] ?>">

            <label for="nom">Nom</label>
            <input class="intitule" id="nom" name="NOM" type="text" value="<?= $salarie['NOM'] ?>" />

            <label for="prenom">Prénom</label>
            <input class="intitule" id="prenom" name="PRENOM" type="text" value="<?= $salarie['PRENOM'] ?>" />

            <label for="mail">Email</label>
            <input class="intitule" id="mail" name="EMAIL_SALARIE" type="text" value="<?= $salarie['EMAIL_SALARIE'] ?>" />

            <label for="telephone">Telephone</label>
            <input class="intitule" id="telephone" name="NUM_TELEPHONE_SALARIE" type="tel" min="10" max="10" value="<?= $salarie['NUM_TELEPHONE_SALARIE'] ?>" />

            <label for="adresse">Adresse</label>
            <input class="intitule" id="adresse" name="ADRESSE_SALARIE" type="text" value="<?= $salarie['ADRESSE_SALARIE'] ?>" />

            <label for="ville">Ville</label>
            <input class="intitule" id="ville" name="VILLE_SALARIE" type="text" value="<?= $salarie['VILLE_SALARIE'] ?>" />

            <label for="cp">Code_Postal</label>
            <input class="intitule" id="cp" name="CODE_POSTAL_SALARIE" type="text" value="<?= $salarie['CODE_POSTAL_SALARIE'] ?>" />

            <label for="genre-select">Genre:</label>
            <?= $salarie['CIVILITE'] ?>
            <select name="CIVILITE" id="genre-select">
                <option value="<?= $salarie['ID_SALARIE'] ?>"><?= $salarie['CIVILITE'] ?></option>
                <option value="homme">homme</option>
                <option value="femme">femme</option>
            </select>

        </fieldset>

        <!-- <fieldset>
            <legend>Photo</legend>
            <input type="file" id="profil" name="PHOTO_SALARIE" accept="image/png, image/jpeg" value="<?= $salarie['PHOTO_SALARIE'] ?>" />
        </fieldset> -->

        <fieldset>
            <legend>Profil</legend>
            <?php

            foreach ($profilsSalarie as $profil) {

                echo '<label>' . $profil['INTITULE_PROFIL'] . '</label><br>';
                echo '<input type="hidden" name="ID_PROFIL[]" value="' . $profil['ID_PROFIL'] . '">';
            }
            ?>

        </fieldset>
        <button><input type="submit" value="Modifier"></button>
    </form>

    <form method="post" action=" <?= url_to('suppr_profil_salarie') ?>">
        <fieldset>
            <legend>Supprimer un profil</legend>
            <input id="ID_SALARIE" name="ID_SALARIE" type="hidden" value="<?= $salarie['ID_SALARIE'] ?>">
            <!--  -->
            <select id="ID_PROFIL" name="ID_PROFIL">
                <?php
                foreach ($profilsSalarie as $profil) {
                    echo '<option value="' . $profil['ID_PROFIL'] . '" required>' . $profil['INTITULE_PROFIL'] . '</option>';
                }
                ?>
            </select>
            <input type="submit" value="-">
        </fieldset>
    </form>

    <form method="post" action=" <?= url_to('ajout_profil_salarie') ?>">
        <fieldset>
            <legend>Ajouter un profil</legend>
            <input id="ID_SALARIE" name="ID_SALARIE" type="hidden" value="<?= $salarie['ID_SALARIE'] ?>">
            <select id="ID_PROFIL" name="ID_PROFIL">
                <?php
                foreach ($listNonProfilSalarie as $profil) {
                    echo '<option value="' .$profil['ID_PROFIL'] . '" required>' . $profil['INTITULE_PROFIL'] . '</option>';
                    // echo '<input id="ID_PROFIL" name="ID_PROFIL" type="hidden" value="'. $profil['ID_PROFIL'] .'">';
                }
                ?>
            </select>
            <input type="submit" value="+">
        </fieldset>
    </form>
    <a href=<?= url_to("page_salarie") ?>><button>Retour</button></a>
</div>
<?= $this->endSection() ?>