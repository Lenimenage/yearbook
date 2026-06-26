<?php require "db.php"; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Year Book de l'école">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <title>YearBook</title>
</head>

<body>

<?php include "header.php"; ?>

<main>

    <section class="presentation">
        <h2>Promotion de l'année</h2>
        <p>Bienvenue à MDS</p>
    </section>

    <section class="Promotion">

        <div class="bts">

            <div class="classe">
                <h3>BTS SIO</h3>
            </div>

            <hr>

            <p>
                Le BTS SIO (Services Informatiques aux Organisations) forme des étudiants
                aux métiers du développement et des réseaux.
            </p>

            <div class="link">
                <a href="etudiants.php?id=1">Plus</a>
            </div>

        </div>

        <div class="bts">

            <div class="classe">
                <h3>BTS CIEL</h3>
            </div>

            <hr>

            <p>
                Le BTS CIEL prépare aux métiers de la cybersécurité,
                des réseaux et de l'électronique.
            </p>

            <div class="link">
                <a href="etudiants.php?id=2">Plus</a>
            </div>

        </div>

    </section>

</main>

</body>

</html>