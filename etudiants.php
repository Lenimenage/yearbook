<?php

session_start();
require "db.php";

$id = $_GET["id"] ?? 0;

// Vérification simple de l'id
$id = (int) $id;

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

$etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);

$titre = $etudiants[0]["titre"] ?? "Promotion";
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="style.css">

    <title>
        <?= htmlspecialchars($titre) ?>
    </title>

</head>

<body>

<?php include "header.php"; ?>

<main>

    <div class="h2">

        <h2>
            <?= htmlspecialchars($titre) ?>
        </h2>

        <?php if (!isset($_SESSION["user"])): ?>

        

        <?php endif; ?>

    </div>

    <section class="container-cartes">

        <?php if (count($etudiants) > 0): ?>

            <?php foreach ($etudiants as $etudiant): ?>

                <div class="cartes">

                    <div class="carte-image">

                        <img
                            class="image"
                            src="images/<?= htmlspecialchars($etudiant["photo"]) ?>"
                            alt="<?= htmlspecialchars(
                                $etudiant["prenom"] . " " . $etudiant["nom"]
                            ) ?>"
                        >

                    </div>

                    <div class="text">

                        <span>

                            <?= htmlspecialchars($etudiant["prenom"]) ?>

                            <?= htmlspecialchars($etudiant["nom"]) ?>

                        </span>

                        <?php if (isset($_SESSION["user"])): ?>

                            <br>

                            <small>
                                <?= htmlspecialchars($etudiant["email"]) ?>
                            </small>

                        <?php endif; ?>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <p>Aucun étudiant trouvé pour cette promotion.</p>

        <?php endif; ?>

    </section>

</main>

</body>

</html>