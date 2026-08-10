<?php

session_start();
require "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = trim($_POST["nom"]);
    $prenom = trim($_POST["prenom"]);
    $email = trim($_POST["email"]);
    $motDePasse = $_POST["mdp"];

    // Vérifier si l'adresse email existe déjà
    $sqlCheck = "
        SELECT id
        FROM registers
        WHERE email = :email
    ";

    $stmtCheck = $pdo->prepare($sqlCheck);

    $stmtCheck->execute([
        "email" => $email
    ]);

    $existingUser = $stmtCheck->fetch();

    if ($existingUser) {

        $message = "Un compte existe déjà avec cette adresse email.";

    } else {

        $mdp = password_hash(
            $motDePasse,
            PASSWORD_DEFAULT
        );

        $sql = "
            INSERT INTO registers
            (nom, prenom, email, mdp)

            VALUES
            (:nom, :prenom, :email, :mdp)
        ";

        $stmt = $pdo->prepare($sql);

        $success = $stmt->execute([
            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $email,
            "mdp" => $mdp
        ]);

        if ($success) {

            $_SESSION["message"] =
                "Inscription réussie. Vous pouvez maintenant vous connecter.";

            header("Location: login.php");
            exit;

        } else {

            $message = "Erreur lors de l'inscription.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscription</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

<link rel="stylesheet" href="style.css?v=2"></head>

<body>

<?php include "header.php"; ?>

<div class="container mt-5">

    <h2>Inscription</h2>

    <?php if (isset($_SESSION["message"])): ?>

        <div class="alert alert-success">
            <?= htmlspecialchars($_SESSION["message"]) ?>
        </div>

        <?php unset($_SESSION["message"]); ?>

    <?php endif; ?>


    <?php if ($message): ?>

        <div class="alert alert-danger">
            <?= htmlspecialchars($message) ?>
        </div>

    <?php endif; ?>

    <form method="post">

        <div class="mb-3">

            <label for="nom" class="form-label">
                Nom
            </label>

            <input
                type="text"
                id="nom"
                name="nom"
                class="form-control"
                required
            >

        </div>

        <div class="mb-3">

            <label for="prenom" class="form-label">
                Prénom
            </label>

            <input
                type="text"
                id="prenom"
                name="prenom"
                class="form-control"
                required
            >

        </div>

        <div class="mb-3">

            <label for="email" class="form-label">
                Email
            </label>

            <input
                type="email"
                id="email"
                name="email"
                class="form-control"
                required
            >

        </div>

        <div class="mb-3">

            <label for="mdp" class="form-label">
                Mot de passe
            </label>

            <input
                type="password"
                id="mdp"
                name="mdp"
                class="form-control"
                required
            >

        </div>

        <button
            type="submit"
            class="btn btn-primary"
        >
            S'inscrire
        </button>

    </form>

</div>

</body>

</html>