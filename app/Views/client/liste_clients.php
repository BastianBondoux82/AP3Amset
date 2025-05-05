<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<a href=<?= url_to("ajout_client") ?>><button>Ajouter client</button></a>

<div class="scontent">
    <?php
    foreach ($listeClients as $client) {
    ?>
        <div class="scontainer">
            <div class="sproduct">

                <fieldset>
                    <img src="img\icon_client.png" />
                    <legend>
                        <h4><?= $client['RAISON_SOCIAL'] ?></h4>
                    </legend>
                    <h4><?= $client['CONTACT'] ?></h4>
                    <p><?= $client['NUM_TELEPHONE_CLIENT'] ?></p>

                    <p><?= $client['ADRESSE_CLIENT'] ?></p>
                    <p><?= $client['CODE_POSTAL_CLIENT'] ?> <?= $client['VILLE_CLIENT'] ?></p>
                </fieldset>
                <a href=" <?= url_to("modif_client", $client['ID_CLIENT']) ?>"><button>Modifier</button></a>

                <form method="post" action=" <?= url_to('suppr_client') ?>">
                    <input id="ID_CLIENT" name="ID_CLIENT" type="hidden" value="<?= $client['ID_CLIENT'] ?>">
                    <input type="submit" value="Supprimer" onclick="return confirm('Si vous SUPPRIMER ce client, supprime toutes les missions associés à ce client et les salariés associé à ces missions !')">
                </form>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<?= $this->endSection() ?>