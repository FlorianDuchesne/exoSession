<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/e2a8fec256.js" crossorigin="anonymous"></script>
  <title>Récapitulatif des produits</title>
</head>

<body>

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

  <main>
    <?php

    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
      echo "<p>Aucun produit en session…</p>";
    } else {
      echo "<table>",
      "<thead>",
      "<tr>",
      "<th>#</th>",
      "<th>Nom</th>",
      "<th>Prix</th>",
      "<th>Quantité</th>",
      "<th>Total</th>",
      "</tr>",
      "</thead>",
      "<tbody>";
      $totalGeneral = 0;

      foreach ($_SESSION['products'] as $index => $product) {
        echo "<tr>",
        "<td>" . $index . "</td>",
        "<td>" . $product['name'] . "</td>",
        "<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
        "<td>" . $product['qtt'] . "</td>",
        "<td>" . number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
        "</tr>";
        $totalGeneral += $product['total'];
      }
      echo "<tr>",
      "<td colspan=4>Total général : </td>",
      "<td><strong>" . number_format($totalGeneral, 2, ",", "&nbsp;") . "&nbsp;€</strong></td>",
      "</tr>",
      "</tbody>",
      "</table>";
    }

    ?>
  </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</html>