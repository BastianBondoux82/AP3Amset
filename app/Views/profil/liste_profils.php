<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<html>
<!-- <link rel="stylesheet" type="text/css" href="css/main.css" /> -->

<body>
    <a href=<?= url_to("create_profil") ?>>Ajouter profil</a>

    <?php
    foreach ($listeProfils as $profil) {
    ?>
        <p>
            <?php

            echo $profil['INTITULE_PROFIL'],
            "<br/>",
            '<a href="' . url_to("modif_profil", $profil['ID_PROFIL']) . '" >Modifier</a>';
            ?>
            <form method="post" action=" <?= url_to('suppr_profil') ?>">
                <input id="ID_PROFIL" name="ID_PROFIL" type="hidden" value="<?= $profil['ID_PROFIL']?>">
                <input type="submit" value="supprimer">
            </form>
            

    </p><br>
<?php


    }
    ?>
</body>

</html>

<?= $this->endSection() ?>
   
















