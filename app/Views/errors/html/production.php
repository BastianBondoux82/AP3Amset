<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">

    <title><?= lang('Errors.whoops') ?></title>

    <style>
        <?= preg_replace('#[\r\n\t ]+#', ' ', file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'debug.css')) ?>
    </style>
</head>
<body>

    <div class="container text-center">

        <h1 class="headline"><?= lang('Errors.whoops') ?></h1>

        <!-- <p class="lead"><?= lang('Errors.weHitASnag') ?></p> -->
        <p class="lead">Erreur de ma part, il manque des choses à revoir dans mon code !</p>
        <p class="lead">En cas d'erreur comme celui-ci, n'hésitez pas à me le faire remonter via mon GitHub en lien dans le pied de page</p>
        <p class="lead"> MERCI d'avance !</p>

        <h1><a href="<?= url_to('list_mission')?>">http://amset1.com</a></h1>
        <h2><a href="https://github.com/Peraty12" target="_blank">https://github.com/Peraty12</a></h2>

    </div>

</body>

</html>
