<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

<div class="fcontent">
    <form method="post" action=" <?= url_to('update_mission') ?>">
        <fieldset>
            <legend>Modification mission</legend>
            <input id="ID_MISSION" name="ID_MISSION" type="hidden" value="<?= $mission['ID_MISSION'] ?>">
            
            <label for="intitule mision">Intitulé de la mission</label>
            <input class="intitule" id="intitule mision" name="INTITULE_MISSION" type="text" value="<?= $mission['INTITULE_MISSION'] ?>" required /><br>
            <label for="description">Description</label>
            <textarea class="description" id="description" name="DESCRIPTION" type="textarea" value="<?= $mission['DESCRIPTION'] ?>" required ><?= $mission['DESCRIPTION'] ?></textarea><br>
            <label for="date debut">Date de début</label>
            <input id="date debut" name="DATE_DEBUT" type="date" value="<?= $mission['DATE_DEBUT'] ?>" required /><br>
            <label for="date fin">Date de fin</label>
            <input id="date fin" name="DATE_FIN" type="date" value="<?= $mission['DATE_FIN'] ?>" required /><br>

            <label for="client"> Client </label>
            <select id="client" name="ID_CLIENT">
                <option value="<?= $client['ID_CLIENT'] ?>"> <?= $client['RAISON_SOCIAL'] ?></option>

                <?php
                foreach ($listeClient as $clienttout) {
                    echo '<option value="' . $clienttout['ID_CLIENT'] . '" required>' . $clienttout['RAISON_SOCIAL'] . '</option>';
                }
                ?>
            </select><br>

        </fieldset>
        <fieldset>
            <legend>Profil</legend>
            <?php

            foreach ($profilsMission as $profil) {

                echo '<label>' . $profil['INTITULE_PROFIL'] . '</label>';
                echo '<input type="hidden" name="ID_PROFIL[]" value="' . $profil['ID_PROFIL'] . '">';
                echo '<input type="number" name=' . $profil['ID_PROFIL'] . ' value="' . $profil['NOMBRE_SALARIE'] . '" " min="1" required ><br>';
            }
            ?>

        </fieldset>
        <input type="submit" value="Modifier">
    </form>

    <form method="post" action=" <?= url_to('suppr_profil_mission') ?>">
        <fieldset>
            <legend>Supprimer un profil</legend>
            <input id="ID_MISSION" name="ID_MISSION" type="hidden" value="<?= $mission['ID_MISSION'] ?>">
            <select id="ID_PROFIL" name="ID_PROFIL">
                <?php
                foreach ($profilsMission as $profil) {
                    echo '<option value="' . $profil['ID_PROFIL'] . '" required>' . $profil['INTITULE_PROFIL'] . '</option>';
                }
                ?>
            </select>
            <input type="submit" value="-">
        </fieldset>
    </form>

    <form method="post" action=" <?= url_to('ajout_profil_mission') ?>">
        <fieldset>
            <legend>Ajouter un profil</legend>
            <input id="ID_MISSION" name="ID_MISSION" type="hidden" value="<?= $mission['ID_MISSION'] ?>">
            <select id="ID_PROFIL" name="ID_PROFIL">
                <?php
                foreach ($listNonProfilMission as $profil) {
                    echo '<option value="' . $profil['ID_PROFIL'] . '" required>' . $profil['INTITULE_PROFIL'] . '</option>';
                    // echo '<input id="ID_PROFIL" name="ID_PROFIL" type="hidden" value="'. $profil['ID_PROFIL'] .'">';
                }
                ?>
            </select>
            <input type="number" name="NOMBRE_PROFIL" value="1" min="1" max="5">
            <input type="submit" value="+">
        </fieldset>
    </form>
    <a href=<?= url_to("gestion_mission", $mission['ID_MISSION']) ?>><button>Retour</button></a>
</div>
<?= $this->endSection() ?>