<?php
  include('conexao.php');
$erro = false;
if(count($_POST) > 0){
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $duvidaTexto = $_POST['duvidaTexto'];
  if(empty($nome)){
    $erro = "Por favor preencha seu nome corretamente";
  }

  if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
    $erro = "Por favor preencha seu e-mail corretamente";
  }
  
  if(strlen($duvidaTexto) < 10){
      $erro = "Escreva com mais detalhes sua dúvida";
  }

  if($erro){
    echo "<p><b>$erro</b></p>";
  }else{
    $codigo_sql = "INSERT INTO duvidas (nome, email, texto) VALUES('$nome', '$email', '$duvidaTexto')";
    $conectado = $mysqli->query($codigo_sql) or die($mysql);
    if($conectado){
      echo "Sua dúvida foi enviada";
      unset($_POST);
    }
  }
}  
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./style/style.css">
  <link rel="stylesheet" href="./style/min.css">
  <title></title>
</head>
<body>
  <div class="center">
    <h1>Deixe sua dúvida</h1>
    <form method="POST" action="">
      <p>
        <label>Nome</label><br>
        <input name="nome" type="text" value="<?php if(isset($_POST['nome'])) echo $_POST['nome'] ?>">
      </p>
      <p>
        <label>E-mail</label><br>
          <input name="email" type="text" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>">
        </p>
      <p>
        <label>Escreva sua dúvida</label><br>
        <textarea name="duvidaTexto" cols="30" rows="10"></textarea>
      </p>
      <p>
        <button class="btn btn-a smooth" type=submit>Enviar</button> 
      </p>


    </form>  
  </div>
</body>
</html>
