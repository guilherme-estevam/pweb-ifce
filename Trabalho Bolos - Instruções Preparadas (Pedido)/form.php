<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>Loja Bolos</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <style>
    body {background: rgb(172,156,255); background: linear-gradient(90deg, rgba(172,156,255,1) 10%, rgba(2,237,255,1) 50%, rgba(172,156,255,1) 90%);}
    </style>
</head>
<body>
  <form class="row g-3 p-5" action="create.php" method="get" onsubmit="return validaForm()">
    <?php echo '<input type="hidden" name="imageName" value="'.$_GET["imageName"].'.jpg">'?>
    <div class="col-md-4">
      <label for="nameInput" class="form-label">Nome</label>
      <input type="text" class="form-control" id="nameInput" name="name" placeholder="Fulano de Tal" required>
    </div>
    <div class="col-md-4">
      <label for="emailInput" class="form-label">Email</label>
      <input type="email" class="form-control" id="emailInput" name="email" placeholder="fulano@gmail.com" required>
    </div>
    <div class="col-md-4">
      <label for="phoneInput" class="form-label">Telefone</label>
      <input type="text" class="form-control" id="phoneInput" name="phone" placeholder="85912345678" required>
    </div>
    <div class="col-md-12">
      <label for="textArea" class="form-label">Escreva aqui detalhes do seu pedido</label>
      <textarea class="form-control" id="textArea" name="details" rows="3"></textarea>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-success">Adicionar</button>
    </div>
  </form>
</body>
</html>
