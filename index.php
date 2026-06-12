<?php
$vue       = $_GET['vue']   . 'accueil';  // 'accueil' ou 'classe'
$classe_id = $_GET['classe'] ?? null;
 
// Sécurité : on accepte uniquement les classes connues
if ($vue === 'classe' && !isset($classes[$classe_id])) {
    $vue       = 'accueil';
    $classe_id = null;
}
 
$classe = $classe_id ? $classes[$classe_id] : null;
$titre  = $classe
    ? htmlspecialchars($classe['nom']) . ' — Yearbook 2024'
    : 'Yearbook 2024';
 
// Petite fonction utilitaire pour les initiales
function initiales(string $prenom, string $nom): string {
    return mb_strtoupper(mb_substr($prenom, 0, 1) . mb_substr($nom, 0, 1));
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Year Book de l'école">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title><?php echo $titre; ?></title>
</head>
<body>

<header>
  <nav>
    <div class="logo">
        <h1>MDS</h1>
        <a href="index.php" class="header-logo">✦ Yearbook</a>
    </div>
    <div class="links">
      <div class="link"><a href="index.html">accueil</a></div>
     <!-- <div class="link"><a href="register.html">inscription</a></div>
      <div class="link"><a href="login.html">connexion</a></div> -->
    </div>
    <div id="burger" class="dropdown" >
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> menu
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.html">accueil</a></li>
           <!-- <li><a class="dropdown-item" href="register.html">inscription</a></li>
            <li><a class="dropdown-item" href="login.html">connexion</a></li> -->
        </ul>
    </div>
    </nav>
   </header>
 
<main>
  <section class="presentation">
    <h2>Promotion de l'année</h2>
    <p>Bienvenue a MDS</p>
  </section>
 
  <section class="Promotion">
    <div class="bts">
      <div class="classe"><h3>BTS SIO</h3></div>
      <hr />
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, sequi?</p>
      <div class="link"><a href="sio.html">plus</a></div>
    </div>
 
    <div class="bts">
      <div class="classe"><h3>BTS CIEL</h3></div>
      <hr />
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, nostrum!</p>
      <div class="link"><a href="ciel.html">plus</a></div>    
    </div>
  </section>
</main>

</body>
</html>