<?php
  include 'conn.php';

  $imageName = $_GET["imageName"];
  $name = $_GET["name"];
  $email = $_GET["email"];
  $phone = $_GET["phone"];
  $details = $_GET["details"];
  
  // A chave é uma chave primária com auto increment, por isso não precisamos adicionar ela no sql
  $sql = "INSERT INTO bolos(imageName, name, email, phoneNumber, details) VALUES (?, ?, ?, ?, ?)";
  
  //stmt = statment ou comando
  //stmt é o comando a ser preparado
  $stmt = mysqli_stmt_init($conn);  
  $stmt_prepared_okay = mysqli_stmt_prepare($stmt, $sql);
  // create a prepared statement
  if($stmt_prepared_okay){
      // Liga parametros com os marcadores
      mysqli_stmt_bind_param($stmt, "sssss", $imageName, $name, $email, $phone, $details);
      // executa a query
      mysqli_stmt_execute($stmt);
      // close statement
      mysqli_stmt_close($stmt);
  }
  
  mysqli_close($conn);
  header('location: ./results.php?imageName='.$_GET["imageName"].'&name='.$_GET["name"].'&email='.$_GET["email"].'&phone='.$_GET["phone"].'&details='.$_GET["details"].'');
?>
