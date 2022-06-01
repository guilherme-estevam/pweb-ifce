<?php
  include 'conn.php';

  $chave = $_GET["chave"];
  $valor = $_GET["valor"];

  $sql = "UPDATE chave_valor SET valor = '$valor' WHERE chave = $chave";

  $result = mysqli_query($conn, $sql);

  mysqli_close($conn);
  header("location: ./index.php");
?>
