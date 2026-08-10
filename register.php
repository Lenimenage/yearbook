<?php
require "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = trim($_POST["nom"]);
    $prenom = trim($_POST["prenom"]);
    $email = trim($_POST["email"]);
    $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO registers (nom, prenom, email, mdp)
            VALUES (:nom, :prenom, :email, :mdp)";

    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([
        "nom" => $nom,
        "prenom" => $prenom,
        "email" => $email,
        "mdp" => $mdp
    ])) {

        header("Location: login.php");
        exit;

    } else {

        $message = "Erreur lors de l'inscription.";

    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include "header.php"; ?>

<div class="container mt-5">

    <h2>Inscription</h2>

    <?php if ($message): ?>
        <div class="alert alert-danger">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <form method="post">

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Prénom</label>
            <input type="text" name="prenom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mot de passe</label>
            <input type="password" name="mdp" class="form-control" required>
        </div>

        <button class="btn btn-primary">S'inscrire</button>

    </form>

</div>

</body>
</html>