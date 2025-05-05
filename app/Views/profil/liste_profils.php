<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<html>
<!-- <link rel="stylesheet" type="text/css" href="css/main.css" /> -->

<body>
    <a href=<?= url_to("create_profil") ?>><button>Ajouter profil</button></a>
    <div class="profil">
        <fieldset class="fieldlist">
            <legend>
                <h4 class="h4p">Liste des Profils</h4>
            </legend>
            <div class="list_profil" style="overflow:scroll; height:400px;">
                <?php
                foreach ($listeProfils as $profil) {
                ?>
                    <div class="div_profil">
                        <?php

                        echo '<h4>' . $profil['INTITULE_PROFIL'] . '</h4>'; ?>
                        <div class="button_profil">

                            <form method="post" action=" <?= url_to('suppr_profil') ?>">
                                <input id="ID_PROFIL" name="ID_PROFIL" type="hidden" value="<?= $profil['ID_PROFIL'] ?>">
                                <button onclick="return confirm('Voulez-vous vraiment supprimer ce profil ?')"><input type="submit" value="supprimer" ></button>
                        </div>
                        </form>
                    </div>
                <?php
                }
                ?>
            </div>
        </fieldset>
        <div class="list_profil_ajout">
            <div>
                <form method="post" action="<?= url_to('ajout_profil') ?>">
                    <fieldset>
                        <legend>
                            <h4 class="h4p">Ajout de profil</h4>
                        </legend>
                        <input type="text" name="INTITULE_PROFIL">
                        <button><input type="submit" value="ajouter"></button>
                    </fieldset>
                </form>
            </div>
            <div>
                <form method="post" action="<?= url_to('update_profil') ?>">
                    <fieldset>
                        <legend>
                            <h4>Modification de profil</h4>
                        </legend>
                        <select name="ID_PROFIL">
                            <?php
                            foreach ($listeProfils as $profil) {
                                echo '<option value="' . $profil['ID_PROFIL'] . '">' . $profil['INTITULE_PROFIL'] . '</option>';
                            }
                            ?>
                        </select>
                        <input type="text" name="INTITULE_PROFIL">
                        <button><input type="submit" value="modifier"></button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?= $this->endSection() ?>