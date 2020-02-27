<?php include('../controllers/servidor.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Sistema de registro PHP e MySQL</title>
  <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
  <div class="header">
  	<h2>Entrar</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('../view/errors.php'); ?>
  	<div class="input-group">
  		<label>Usuario</label>
  		<input type="text" name="nome" >
  	</div>
  	<div class="input-group">
  		<label>Senha</label>
  		<input type="password" name="senha">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Entrar</button>
  	</div>
  	<p>
  		
Ainda não é um membro? <a href="cadastrar.php">inscrever-se</a>
  	</p>
  </form>
</body>
</html>