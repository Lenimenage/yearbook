<?php

require "db.php";

$id = $_GET["id"] ?? 0;

$sql = "
SELECT
    e.nom,
    e.prenom,
    e.email,
    e.photo,
    f.titre
FROM etudiants e
INNER JOIN filiaires f
ON e.filiaire_id = f.id
WHERE f.id = :id
";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    "id" => $id
]);

$etudiants = $stmt->fetchAll();

$stmt->closeCursor();

$titre = "";

if (!empty($etudiants)) {
    $titre = $etudiants[0]["titre"];
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <title><?=($titre) ?></title>

</head>

<body>

<?php include "header.php"; ?>

<main>

    <div class="h2">
        <h2><?=($titre) ?></h2>
    </div>

    <section class="container-cartes">

        <?php foreach ($etudiants as $etudiant): ?>

            <div class="cartes">

                <div class="carte-image">

                    <?php if (!empty($etudiant["photo"])) : ?>

                        <img class="image"
                             src="images/<?=($etudiant["photo"]) ?>"
                             alt="<?= ($etudiant["prenom"]) ?>">

                    <?php else : ?>

                        <img class="image"
                             src="images/default.png"
                             alt="Photo par défaut">

                    <?php endif; ?>

                </div>

                <div class="text">

                    <span>
                        <?=($etudiant["prenom"]) ?>
                        <?=($etudiant["nom"]) ?>
                    </span>

                    <br>

                    <small>
                        <?=($etudiant["email"]) ?>
                    </small>

                </div>

            </div>

        <?php endforeach; ?>

    </section>

</main>

</body>

</html>