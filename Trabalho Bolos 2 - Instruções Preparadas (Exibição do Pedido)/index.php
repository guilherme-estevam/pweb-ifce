<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>Loja Bolos</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <style>
    body {background: rgb(172,156,255); background: linear-gradient(90deg, rgba(172,156,255,1) 10%, rgba(2,237,255,1) 50%, rgba(172,156,255,1) 90%);}
    </style>
</head>
<body>
  <div class="container" style="text-align: center;width: 100%;padding-top: 5%;">
    <div class="row align-items-center" >
      <div class="col dropdown-center dropdown-menu-dark">
        <button class="btn btn-dark btn-lg dropdown-toggle" type="button" id="dropdown2" data-bs-toggle="dropdown" aria-expanded="false">
          Filtrar por Status
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdown2">
          <?php
            $filtro = $_GET["filtro"];

            $filtroTodos = "";
            $filtroVisto = "";
            $filtroAtendimento = "";
            $filtroFinalizado = "";
            $filtroLixo = "";

            if($filtro == "Todos" or $filtro == ""){
              $filtroTodos = "active";
            } else if($filtro == "Visto"){
              $filtroVisto = "active";
            } else if($filtro == "Em Atendimento"){
              $filtroAtendimento = "active";
            } else if($filtro == "Finalizado"){
              $filtroFinalizado = "active";
            } else if($filtro == "Lixo"){
              $filtroLixo = "active";
            }

            echo '<li><a class="dropdown-item '.$filtroTodos.'" href="./index.php?filtro=Todos">Todos</a></li>';
            echo '<li><a class="dropdown-item '.$filtroVisto.'" href="./index.php?filtro=Visto">Visto</a></li>';
            echo '<li><a class="dropdown-item '.$filtroAtendimento.'" href="./index.php?filtro=Em Atendimento">Em Atendimento</a></li>';
            echo '<li><a class="dropdown-item '.$filtroFinalizado.'" href="./index.php?filtro=Finalizado">Finalizado</a></li>';
            echo '<li><a class="dropdown-item '.$filtroLixo.'" href="./index.php?filtro=Lixo">Lixo</a></li>';
          ?>
        </ul>
      </div>
      <div class="col">
        <button type="button" class="btn btn-danger btn-lg" onclick="location.href='./delete.php'">Deletar Pedidos Lixo</button>
      </div>
    </div>
  </div>

  <div class="w-50" style="margin: auto; margin-top:2%; margin-bottom:5%;">
    <table class="table table-dark table-striped table-hover align-middle">
      <thead>
        <tr>
          <th scope="col">Pedido Nº</th>
          <th scope="col">Nome do Cliente</th>
          <th scope="col">Email do Cliente</th>
          <th scope="col">Telefone do Cliente</th>
          <th scope="col">Detalhes do Pedido</th>
          <th scope="col">Status do Pedido</th>
        </tr>
      </thead>
      <tbody>
          <tr>
            <?php 
              header('Content-type: text/html; charset=utf-8');

              include 'conn.php';
              
              if($filtro == "Todos" or $filtro == ""){
                $sql = "SELECT * FROM bolos ORDER BY id";

                $result = mysqli_query($conn, $sql);
            
                while ($row = mysqli_fetch_assoc($result)) {
                  $id=$row["id"];
                  $imageName=$row["imageName"];
                  $name=$row["name"];
                  $email=$row["email"];
                  $phoneNumber=$row["phoneNumber"];
                  $details=$row["details"];
                  $status=$row["status"];
                  
                  $visto = "";
                  $atendimento = "";
                  $finalizado = "";
                  $lixo = "";

                  if($status == "Visto"){
                    $visto = "active";
                  } else if($status == "Em Atendimento"){
                    $atendimento = "active";
                  } else if($status == "Finalizado"){
                    $finalizado = "active";
                  } else if($status == "Lixo"){
                    $lixo = "active";
                  }

                  echo '<tr><th scope="row">'.$id.'</th>';
                  echo '<td><p>'.$name.'</p></td>';
                  echo '<td><p>'.$email.'</p></td>';
                  echo '<td><p>'.$phoneNumber.'</p></td>';
                  echo '<td><p>'.$details.'</p></td>';
                  echo '<td>
                          <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown1" data-bs-toggle="dropdown" aria-expanded="false">'
                              .$status.
                            '</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdown1">
                              <li><a class="dropdown-item '.$visto.'" href="./update.php?id='.$id.'&status=Visto">Visto</a></li>
                              <li><a class="dropdown-item '.$atendimento.'" href="./update.php?id='.$id.'&status=Em Atendimento">Em Atendimento</a></li>
                              <li><a class="dropdown-item '.$finalizado.'" href="./update.php?id='.$id.'&status=Finalizado">Finalizado</a></li>
                              <li><a class="dropdown-item '.$lixo.'" href="./update.php?id='.$id.'&status=Lixo">Lixo</a></li>
                            </ul>
                        </td></tr>';
                }
              } else {
                $sql = "SELECT * FROM bolos WHERE status = ? ORDER BY id";

                //stmt = statment ou comando
                //stmt é o comando a ser preparado
                $stmt = mysqli_stmt_init($conn);  
                $stmt_prepared_okay = mysqli_stmt_prepare($stmt, $sql);
                // create a prepared statement
                if($stmt_prepared_okay){
                  // Liga parametros com os marcadores
                  mysqli_stmt_bind_param($stmt, "s", $filtro);
                  // executa a query
                  mysqli_stmt_execute($stmt);
                  // get results
                  $result = mysqli_stmt_get_result($stmt);

                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $id=$row["id"];
                    $imageName=$row["imageName"];
                    $name=$row["name"];
                    $email=$row["email"];
                    $phoneNumber=$row["phoneNumber"];
                    $details=$row["details"];
                    $status=$row["status"];
                    
                    $visto = "";
                    $atendimento = "";
                    $finalizado = "";
                    $lixo = "";
    
                    if($status == "Visto"){
                      $visto = "active";
                    } else if($status == "Em Atendimento"){
                      $atendimento = "active";
                    } else if($status == "Finalizado"){
                      $finalizado = "active";
                    } else if($status == "Lixo"){
                      $lixo = "active";
                    }
    
                    echo '<tr><th scope="row">'.$id.'</th>';
                    echo '<td><p>'.$name.'</p></td>';
                    echo '<td><p>'.$email.'</p></td>';
                    echo '<td><p>'.$phoneNumber.'</p></td>';
                    echo '<td><p>'.$details.'</p></td>';
                    echo '<td>
                            <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown1" data-bs-toggle="dropdown" aria-expanded="false">'
                                .$status.
                              '</button>
                              <ul class="dropdown-menu" aria-labelledby="dropdown1">
                                <li><a class="dropdown-item '.$visto.'" href="./update.php?id='.$id.'&status=Visto">Visto</a></li>
                                <li><a class="dropdown-item '.$atendimento.'" href="./update.php?id='.$id.'&status=Em Atendimento">Em Atendimento</a></li>
                                <li><a class="dropdown-item '.$finalizado.'" href="./update.php?id='.$id.'&status=Finalizado">Finalizado</a></li>
                                <li><a class="dropdown-item '.$lixo.'" href="./update.php?id='.$id.'&status=Lixo">Lixo</a></li>
                              </ul>
                          </td></tr>';
                  }
                } else {
                  echo "Filtragem Inválida";
                }
                // closing
                mysqli_stmt_close($stmt);
              }
              mysqli_free_result($result);
              mysqli_close($conn);
            ?>
          </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
