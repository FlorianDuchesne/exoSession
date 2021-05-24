<?php
if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
  echo "<p>Aucun produit en session…</p>";
} else {
  echo "dans votre panier il y a actuellement :";
  echo "<ul>";
  foreach ($_SESSION['products'] as $index => $product) {
    echo "<li><a href='traitement.php?action=minusById&id=" . $index . "'><i class='fas fa-minus'></i></a>" . $product['qtt'] . "<a href='traitement.php?action=plusById&id=" . $index . "'><i class='fas fa-plus'></i></a>" . $product['name'] . " <a href='traitement.php?action=deleteById&id=" . $index . " '><i class='far fa-trash-alt'></i></a></li>";
  }
  echo "</ul>";

  echo "<a href='traitement.php?action=deleteAll'>Supprimer tout le contenu du panier</a>";
}
