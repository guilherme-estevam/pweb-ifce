<?php
  include 'conn.php';

  $valor = $_GET["valor"];

  // A chave é uma chave primária com auto increment, por isso não precisamos adicionar ela no sql
  $sql = "INSERT INTO chave_valor(valor) VALUES ('$valor')";

  mysqli_query($conn, $sql);
  
  mysqli_close($conn);
  header("location: ./index.php");
?>
