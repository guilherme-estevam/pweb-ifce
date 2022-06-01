<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>CRUD de Chave-Valor</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <style>
    body {background: rgb(33,37,41);background: linear-gradient(90deg, rgba(33,37,41,1) 10%, rgba(255,255,255,1) 50%, rgba(33,37,41,1) 90%);}
    </style>
</head>
<body>
  <div style="text-align: center;width: 100%;padding-top: 5%;">
    <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#createModal">Adicionar Chave-Valor</button>
  </div>
  <div class="w-50" style="margin: auto; margin-top:2%; margin-bottom:5%;">
    <table class="table table-dark table-striped table-hover align-middle">
      <thead>
        <tr>
          <th scope="col">Chave</th>
          <th scope="col">Valor</th>
          <th scope="col">Editar</th>
          <th scope="col">Deletar</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          header('Content-type: text/html; charset=utf-8');

          include 'conn.php';
          
          
          $sql = "SELECT chave, valor FROM chave_valor ORDER BY chave";
          
          $result = mysqli_query($conn, $sql);
          
          if (!$result) {
              die("Falha na Execução da Consulta: " . $sql ."<br>" .
              mysqli_error($conn));
          }
          
          if (mysqli_num_rows($result) == 0) {
              echo "Não foram encontradas linhas, nada para mostrar <br>";
          }
          
          while ($row = mysqli_fetch_assoc($result)) {
              $chave=$row["chave"];
              $valor=$row["valor"];
              echo '<tr><th id="chaveRow" scope="row">'.$chave.'</th>';
              echo '<td>'.$valor.'</td>';
              echo "<td><button type='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#updateModal' onclick ='saveKey(String($chave))'>Editar</button></td>";
              echo '<form action="delete.php" method="get">';
              echo "<input type='hidden' id='chave' name='chave' value=\"$chave\">";
              echo '<td><button type="submit" class="btn btn-danger">Deletar</button></td></tr>';
              echo '</form>';
          }
          
          mysqli_free_result($result);
        ?>
      </tbody>
    </table>
  </div>

  <!-- Update Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateModalLabel">Atualizar Valor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id=updateForm action="update.php" method="get">
          <div class="modal-body">
            <div class="mb-3">
              <label for="updateValue" class="form-label">Novo Valor</label>
              <input type="text" class="form-control" id="updateValue" name="valor" placeholder="Digite o Novo Valor" required>
              <input type="hidden" id="updateKey" name="chave" value="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" onclick="getKey()" onkeypress="return event.keyCode != 13;">Atualizar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Create Modal -->
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel">Adicionar Chave-Valor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="create.php" method="get">
          <div class="modal-body">
            <div class="mb-3">
              <label for="valueInput" class="form-label">Valor</label>
              <input type="text" class="form-control" id="valueInput" name="valor" placeholder="Digite um Valor" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Adicionar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<script>
  var lastKey;
  function saveKey(key){
    lastKey = key;
  }

  function getKey(){
    document.getElementById("updateKey").value=lastKey;
    document.getElementById("updateForm").submit();
  }
</script>
</html>
