<?php
session_start();
require "db.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>YearBook</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

<link rel="stylesheet" href="style.css?v=2"></head>

<body>

<?php include "header.php"; ?>

<main>

    <?php if (isset($_SESSION["message"])): ?>

        <div class="alert alert-success text-center mt-3">
            <?= htmlspecialchars($_SESSION["message"]) ?>
        </div>

        <?php unset($_SESSION["message"]); ?>

    <?php endif; ?>

    <section class="presentation">

        <h2>Promotion de l'année</h2>

        <?php if (isset($_SESSION["user"])): ?>

            <p>
                Bienvenue
                <?= htmlspecialchars($_SESSION["user"]["prenom"]) ?> 👋
            </p>

        <?php else: ?>

            <p>Bienvenue à MDS</p>

        <?php endif; ?>

    </section>

    <section class="Promotion">

        <div class="bts">

            <div class="classe">
                <h3>BTS SIO</h3>
            </div>

            <hr>

            <p>
                Le BTS SIO (Services Informatiques aux Organisations)
                forme des étudiants aux métiers de l'informatique :
                développement d'applications et gestion des réseaux.
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
                Le BTS CIEL (Cybersécurité, Informatique et réseaux,
                Électronique) prépare les étudiants aux métiers de
                la cybersécurité et des réseaux.
            </p>

            <div class="link">
                <a href="etudiants.php?id=2">Plus</a>
            </div>

        </div>

    </section>

</main>

</body>

</html>