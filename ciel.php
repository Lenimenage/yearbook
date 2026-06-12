<?php
require 'db.php';

$sql = "
    SELECT e.nom, e.prenom, e.email, e.photo
    FROM etudiants e
    INNER JOIN filiaires f ON e.filiaire_id = f.id
    WHERE f.titre = 'BTS CIEL'
";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$etudiants = $stmt->fetchAll();
$stmt->closeCursor();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <title>Étudiants CIEL</title>
</head>

<body>

<?php include "header.php"; ?>

<main>

   <div class="h2">
       <h2>Filière CIEL</h2>
     </div>
    <section class="container-cartes">

        <?php foreach ($etudiants as $etudiant): ?>

            <div class="cartes">

                <div class="carte-image">
                    <img class="image"
                         src="images/<?= htmlspecialchars($etudiant['photo']) ?>"
                         alt="<?= htmlspecialchars($etudiant['prenom']) ?>">
                </div>

                <div class="text">

                    <span>
                        <?= htmlspecialchars($etudiant['prenom']) ?>
                        <?= htmlspecialchars($etudiant['nom']) ?>
                    </span>

                    <br>

                    <small>
                        <?= htmlspecialchars($etudiant['email']) ?>
                    </small>

                </div>

            </div>

        <?php endforeach; ?>

    </section>

</main>

</body>
</html>