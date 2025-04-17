<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<link rel="stylesheet" type="text/css" href="css/main.css" />

<a class=button href="<?= url_to('ajout_salarie') ?>"><button>Ajouter un salarié</button></a>

<div class="scontent">
    <?php
    foreach ($listeSalaries as $salarie) {
    ?>
        <div class="scontainer">
            <div class="sproduct">

                <fieldset>
                    <img src="img\icon_salarie.png" />
                    <legend>
                        <h4><?= $salarie['NOM'] ?> <?= $salarie['PRENOM'] ?></h4>
                    </legend>
                    <p><?= $salarie['EMAIL_SALARIE'] ?></p>
                    <p><?= $salarie['NUM_TELEPHONE_SALARIE'] ?></p>

                    <p><?= $salarie['CIVILITE'] ?></p>
                    <p><?= $salarie['ADRESSE_SALARIE'] ?></p>
                    <p><?= $salarie['CODE_POSTAL_SALARIE'] ?> <?= $salarie['VILLE_SALARIE'] ?></p>
                </fieldset>
                <fieldset>
                    <legend>Profil</legend>
                    <?php
                    foreach ($profilsSalarie as $profils) {
                        foreach ($profils as $profil) {
                            if ($salarie['ID_SALARIE'] == $profil['ID_SALARIE']) {
                                echo '<label>' . $profil['INTITULE_PROFIL'] . '</label><br>';
                                // echo '<input type="hidden" name="ID_PROFIL[]" value="' . $profil['ID_PROFIL'] . '">';
                            }
                        }
                    }
                    ?>
                </fieldset>
                <a href=" <?= url_to("modif_salarie", $salarie['ID_SALARIE']) ?>"><button>Modifier</button></a>

                <form method="post" action=" <?= url_to('suppr_salarie') ?>">
                    <input id="ID_SALARIE" name="ID_SALARIE" type="hidden" value="<?= $salarie['ID_SALARIE'] ?>">
                    <input type="submit" value="supprimer">
                </form>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?= $this->endSection() ?>