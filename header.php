<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
  <nav>
    <div>
       <a href="index.php"><h1>MDS</h1></a>
       <span>✦ Yearbook</span>
    </div>

    <div class="links">


        <?php if (!isset($_SESSION["user"])): ?>
          <div class="link">
            <a href="register.php">Inscription</a>
          </div>
          <div class="link">
            <a href="login.php">Connexion</a>
          </div>
        <?php else: ?>
            <a href="logout.php">Déconnexion</a>

        <?php endif; ?>

    </div>
  </nav>
</header>