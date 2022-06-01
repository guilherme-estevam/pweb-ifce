<?php
  include 'conn.php';

  $chave = $_GET["chave"];

  $sql = "DELETE FROM chave_valor WHERE chave=$chave";

  $result = mysqli_query($conn, $sql);

  mysqli_close($conn);
  header("location: ./index.php");
?>
