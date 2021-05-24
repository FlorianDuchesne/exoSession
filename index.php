<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/e2a8fec256.js" crossorigin="anonymous"></script>
  <title>Ajout produit</title>
</head>

<body>
  <?php
  session_start();
  ?>
  <div id="panier">
    <i class="fas fa-shopping-cart"></i>
    <?php
    include_once("panier.php") ?>

  </div>

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" aria-current="page" href="index.php">index</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="recap.php">recap</a>
    </li>
  </ul>

  <div id="message">
    <?php
    if (isset($_GET["error"])) {
      echo "<p>désolé, un problème est survenu ! : /</p>";
    } else if (isset($_GET["success"])) {
      echo "<p>Produit bien rajouté au panier ! : )</p>";
    } else if (isset($_GET["delete"])) {
      echo "<p>Produit bien supprimé du panier ! : )</p>";
    }
    ?>
  </div>
  <main>
    <h1>Ajouter un produit</h1>
    <form action="traitement.php" method="post">
      <p>
        <input type="text" name="name" placeholder="Nom du produit">
      </p>
      <p>
        <input type="number" step="any" name="price" placeholder="Prix du produit">
      </p>
      <p>
        <input type="number" name="qtt" valuie="1" placeholder="Quantité désirée">
      </p>
      <p>
        <input id="submit" type="submit" name="submit" value="Ajouter le produit">
      </p>
    </form>
  </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</html>