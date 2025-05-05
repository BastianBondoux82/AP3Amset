<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<a href=<?= url_to("ajout_mission") ?>><button>Ajouter mission</button></a>
<div class="mission">
    <div style="overflow:scroll; height:550px; width:50%; background-color:#36686f">
        <div class="content">
            <?php
            foreach ($listeMissionsFalse as $mission) {
            ?>
                <div class="containerf">
                    <a href=<?= url_to("gestion_mission", $mission['ID_MISSION']) ?>>
                        <div class="product">
                            <h2><?= $mission['INTITULE_MISSION'] ?></h2>
                            <p><?= $mission['RAISON_SOCIAL'] ?></p>
                            <p><?= $mission['DATE_DEBUT'], " ", $mission['DATE_FIN'] ?></p>
                        </div>
                    </a>
                </div>
            <?php

            }
            ?>
        </div>
    </div>

    <div style="overflow:scroll; height:550px;width:50%;background-color:#36686f">
        <div class="content">
            <?php
            foreach ($listeMissionsTrue as $mission) {
            ?>
                <div class="containert">
                    <a href=<?= url_to("gestion_mission", $mission['ID_MISSION']) ?>>
                        <div class="product">
                            <h2><?= $mission['INTITULE_MISSION'] ?></h2>
                            <p><?= $mission['RAISON_SOCIAL'] ?></p>
                            <p><?= $mission['DATE_DEBUT'], " ", $mission['DATE_FIN'] ?></p>
                        </div>
                    </a>
                </div>
            <?php

            }
            ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>