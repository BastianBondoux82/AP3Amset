<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/form.css" />
    <title>Amset</title>

</head>

<body>

    <header>
        <h1>Bienvenue sur l'application web Amset</h1>
    </header>
    <main>
        <form method="post" action="<?= url_to('list_mission')?>">

            <label for="Identifiant"> Identifiant </label>
            <input id="Identifiant" name='Identifiant' type="text">
            <label for="Mot de passe"> Mot de passe </label>
            <input id="Mot de passe" name='Mot de passe' type="password">
            
            </select>


            <input type="submit" value="Valider">

        </form>
    </main>

    <!-- Et voici notre pied de page utilisé sur toutes les pages du site -->
    <footer>
        <p>©Copyright 2024 par BTS</p>
    </footer>
</body>

</html>