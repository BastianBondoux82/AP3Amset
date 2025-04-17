<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<body>

    <div class="containerMission">
        <div class="headerMission">
            <div class="header-itemMission">
                <h4> Intitulé de la mission : </h4>
                <p><?= $mission['INTITULE_MISSION'] ?></p>
                <h4>Client concerné:</h4>
                <p><?= $client['RAISON_SOCIAL'] ?></p>
                <h4>Profil(s):</h4>
                <p>
                    <?php
                    foreach ($profilsMission as $profil) {
                        echo $profil['INTITULE_PROFIL'] . " x". $profil['NOMBRE_SALARIE'] ."/ ";
                    }
                    ?>
                </p>
            </div>
            <div class="header-itemMission">
                <p>Date Début: <?= $mission['DATE_DEBUT'] ?></p>
                <p>Date fin: <?= $mission['DATE_FIN'] ?></p>
            </div>
        </div>
        <div class="descriptionMission">
            <h4>Description</h4>
            <p><?= $mission['DESCRIPTION'] ?></p>
        </div>
        <div class="buttonsMission">
        <a href=<?= url_to("attribution_mission", $mission['ID_MISSION'])?>><button>Affecter le(s) salarié(s)</button>
            <a href=<?= url_to("modif_mission", $mission['ID_MISSION'])?>><button>Modifier</button></a>
            <form method="post" action=" <?= url_to('suppr_mission') ?>">
                <input id="ID_MISSION" name="ID_MISSION" type="hidden" value="<?= $mission['ID_MISSION'] ?>">
                <button><input type="submit" value="supprimer"></button>
            </form>
            <a href=<?= url_to("list_mission") ?>><button>Retour</button></a>
        </div>
    </div>

</body>

<?= $this->endSection() ?>