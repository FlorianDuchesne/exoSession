<?php
session_start();

if (isset($_POST['submit'])) {
  $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
  $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

  if ($name && $price && $qtt) {

    $product = [
      "name" => $name,
      "price" => $price,
      "qtt" => $qtt,
      "total" => $price * $qtt
    ];

    $_SESSION['products'][] = $product;
    header("Location:index.php?success");
  }
}

if (isset($_GET['action'])) {
  if (isset($_GET["id"])) {
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
  }

  switch ($_GET['action']) {

    case "deleteById":
      unset($_SESSION['products'][$id]);
      header("Location:index.php?delete");
      break;
    case "deleteAll":
      unset($_SESSION['products']);
      header("Location:index.php");
      break;
    case "plusById":
      $_SESSION['products'][$id]['qtt']++;
      $_SESSION['products'][$id]['total'] = ($_SESSION['products'][$id]['qtt'] * $_SESSION['products'][$id]['price']);
      header("Location:index.php");
      break;
    case "minusById":
      $_SESSION['products'][$id]['qtt']--;
      $_SESSION['products'][$id]['total'] = ($_SESSION['products'][$id]['qtt'] * $_SESSION['products'][$id]['price']);
      header("Location:index.php");
      break;
  }
}
