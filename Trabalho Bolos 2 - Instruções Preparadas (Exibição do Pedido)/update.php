<?php
  include 'conn.php';

  $id = $_GET["id"];
  $status = $_GET["status"];
  
  $sql = "UPDATE bolos SET status = ? WHERE id = ?";
  
  //stmt = statment ou comando
  //stmt é o comando a ser preparado
  $stmt = mysqli_stmt_init($conn);  
  $stmt_prepared_okay = mysqli_stmt_prepare($stmt, $sql);
  // create a prepared statement
  if($stmt_prepared_okay){
      // Liga parametros com os marcadores
      mysqli_stmt_bind_param($stmt, "ss", $status, $id);
      // executa a query
      mysqli_stmt_execute($stmt);
      // close statement
      mysqli_stmt_close($stmt);
  }
  
  mysqli_close($conn);
  header('location: ./index.php?filtro=Todos');
?>
