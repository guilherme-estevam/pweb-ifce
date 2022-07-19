<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <title>Uploader</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <style>
    body {background: rgb(0,212,255); background: linear-gradient(90deg, rgba(0,212,255,1) 5%, rgba(196,0,255,1) 50%, rgba(0,212,255,1) 95%);}
    </style>
</head>
<body>
  <div class="container" style="text-align: center;width: 100%;padding-top: 5%;">
    <?php
      //pasta dentro do HTDOCS onde os arquivos serão salvos.
      $target_dir = "./files/"; 

      $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);

      echo '<div class="row"><h3>Alvo: '.$target_file.'</h3></div>';

      $uploadOk = 1; //Flag

      $fileExtesion = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

      echo '<div class="row"><h3>Extensão: '.$fileExtesion.'</h3></div>';

      // Check if file already exists
      if (file_exists($target_file)) {
        echo '<div class="row"><h3>Infelizmente, o arquivo já existe.</h3></div>';
        $uploadOk = 0;
      }

      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 2097152) { // 2MB 
        echo '<div class="row"><h3>Infelizmente, seu arquivo é muito grande.</h3></div>';
        $uploadOk = 0;
      }

      // Allow certain file formats
      if ($fileExtesion != "pdf" && $fileExtesion != "docx" && 
          $fileExtesion != "doc" && $fileExtesion != "txt") {
        echo '<div class="row"><h3>Infelizmente, apenas PDF, DOCX, DOC e TXT são tipos possíveis.</h3></div>';
        $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo '<div class="row"><h3>Infelizmente, seu arquivo não foi enviado para a base se dados.</h3></div>';
      // if everything is ok, try to upload file
      } else {                 //arquivo fonte                      //destino
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo '<div class="row"><h3>O arquivo '.htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])).' foi feito o upload com sucesso.</h3></div>';
        } else {
          echo '<div class="row"><h3>Infelizmente, houve um erro no upload do arquivo.</h3></div>';
        }
      }
    ?>
  </div>
</body>
</html>
