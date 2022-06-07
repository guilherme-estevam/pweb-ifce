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
  <div class="p-5 m-2">
    <div class="row justify-content-md-center pb-4">
      <div class="col-md-auto">
        <h4>Seu pedido foi gravado com sucesso na nossa base. Em breve entraremos em contato. Obrigado.</h4>
      </div>
    </div>
    <div class="row justify-content-md-center">
      <div class="col-md-auto">
        <?php echo '<h6>Nome: '.$_GET["name"].'</h6>' ?>
      </div>
      <div class="col-md-auto">
        <?php echo '<h6>Email: '.$_GET["email"].'</h6>' ?>
      </div>
      <div class="col-md-auto">
        <?php echo '<h6>Telefone: '.$_GET["phone"].'</h6>' ?>
      </div>
    </div>
    <div class="row justify-content-md-center">
      <div class="col-md-auto">
        <?php echo '<h6>Detalhes do Pedido: '.$_GET["details"].'</h6>' ?>
      </div>
    </div>
    <div class="row justify-content-md-center">
      <div class="col-md-auto">
        <?php echo '<img class="img-thumbnail img-responsive" src="images/'.$_GET["imageName"].'" width="540" height="360">' ?>
      </div>
    </div>
  </div>
</body>
</html>
