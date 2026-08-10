<?php

session_start();
require "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"]);
    $mdp = $_POST["mdp"];

    $sql = "SELECT * FROM registers WHERE email = :email";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        "email" => $email
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($mdp, $user["mdp"])) {

        $_SESSION["user"] = [
            "id" => $user["id"],
            "nom" => $user["nom"],
            "prenom" => $user["prenom"],
            "email" => $user["email"]
        ];

        $_SESSION["message"] =
            "Bienvenue " . $user["prenom"] . " !";

        header("Location: index.php");
        exit;

    } else {

        $message = "Email ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connexion</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

<link rel="stylesheet" href="style.css?v=2"> </head>

<body>

<?php include "header.php"; ?>

<div class="container mt-5">

    <h2>Connexion</h2>

    <?php if ($message): ?>

        <div class="alert alert-danger">
            <?= htmlspecialchars($message) ?>
        </div>

    <?php endif; ?>

    <form method="post">

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
            class="btn btn-success"
        >
            Se connecter
        </button>

    </form>

</div>

</body>

</html>