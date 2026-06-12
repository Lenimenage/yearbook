<?php require "db.php" ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Year Book de l'école">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Yearbook</title>
</head>
<body>
     <?php include "header.php" ?>

<main>
  <section class="presentation">
    <h2>Promotion de l'année</h2>
    <p>Bienvenue a MDS</p>
  </section>
 
  <section class="Promotion">
    <div class="bts">
      <div class="classe"><h3>BTS SIO</h3></div>
      <hr />
      <p>Le BTS SIO (Services Informatiques aux Organisations) forme des étudiants aux métiers de l’informatique : développement d’application et gestion de réseaux. Cette formation permet d’acquérir des compétences solides pour travailler dans le domaine du numérique.</p>
      <div class="link"><a href="sio.php">plus</a></div>
    </div>
 
    <div class="bts">
      <div class="classe"><h3>BTS CIEL</h3></div>
      <hr />
      <p>Le BTS CIEL (Cybersécurité, Informatique et réseaux, Électronique) prépare les étudiants aux métiers liés à la cybersécurité, aux réseaux et aux systèmes embarqués. C’est une formation technique qui met l’accent sur la sécurité des systèmes et les technologies modernes.</p>
      <div class="link"><a href="ciel.php">plus</a></div>    
    </div>
  </section>
</main>

</body>
</html>