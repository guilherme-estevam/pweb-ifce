<?php
  include 'conn.php';

  $chave = $_GET["chave"];
  
  $sql = "DELETE FROM chave_valor WHERE chave=?";
  
  //stmt = statment ou comando
  //stmt é o comando a ser preparado
  $stmt = mysqli_stmt_init($conn);  
  $stmt_prepared_okay = mysqli_stmt_prepare($stmt, $sql);
  // create a prepared statement
  if($stmt_prepared_okay){
      // Liga parametros com os marcadores
      mysqli_stmt_bind_param($stmt, "s", $chave);
      // executa a query
      mysqli_stmt_execute($stmt);
      // close statement
      mysqli_stmt_close($stmt);
  }

  mysqli_close($conn);
  header("location: ./index.php");
?>
