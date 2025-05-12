<?php
$user = auth()->user();
$admin = $user && $user->inGroup('admin');
$com = $user && $user->inGroup('com');
$rhu = $user && $user->inGroup('rhu');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Amset</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
</head>

<body>

    <!-- HEADER: MENU + HEROE SECTION -->
    <header>

        <h1>Bienvenue sur l'application Amset </h1>
        <nav class="menu">
            <ul>

                <?= $rhu ? '' : '<li><a href="' . url_to('list_mission') . '">liste mission</a></li>' ?>
                <?= $com ? '' : '<li><a href="' . url_to('page_salarie') . '">liste salarié</a></li>' ?>
                <?= $rhu ? '' : '<li><a href="' . url_to('page_client') . '">liste client</a></li>' ?>
                <?= $admin ? '<li><a href="' . url_to('page_profil') . '">liste profil</a></li>' : '' ?>
                <?= $admin ? '<li><a href="' . url_to('phpmyadmin') . '" target="_blank" >phpMyAdmin</a></li>' : '' ?>
                <li><a href="<?= url_to('logout') ?>">Deconnexion</a></li>
            </ul>
        </nav>

    </header>

    <!-- CONTENT -->

    <section>

        <?= $this->renderSection('contenu') ?>

    </section>

    </div>

    <!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

    <footer>

        <div class="environment">

            <p>Page rendered in {elapsed_time} seconds</p>
            <a href="https://github.com/BastianBondoux82" target="_blank">https://github.com/BastianBondoux82</a>
            <p>Environment: <?= ENVIRONMENT ?></p>

        </div>

        <div class="copyrights">

            <p>&copy; <?= date('Y') ?> MARQUEZ Paul, BONDOUX Bastian, XIONG Teddy. Projet Amset1 non open source publié dans le cadre du BTS SIO</p>

        </div>

    </footer>

    <!-- SCRIPTS -->

    <script {csp-script-nonce}>
        document.getElementById("menuToggle").addEventListener('click', toggleMenu);

        function toggleMenu() {
            var menuItems = document.getElementsByClassName('menu-item');
            for (var i = 0; i < menuItems.length; i++) {
                var menuItem = menuItems[i];
                menuItem.classList.toggle("hidden");
            }
        }
    </script>

    <!-- -->

</body>

</html>
