<?php include('../controllers/servidor.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Sistema de registro PHP e MySQL</title>
  <link rel="stylesheet" type="text/css" href="../view/estilo.css">
</head>
<body>
  <div class="header">
  	<h2>Cadastro</h2>
  </div>
	
  <form method="post" action="../view/cadastrar.php">
  	<?php include('../view/errors.php'); ?>
  	<div class="input-group">
  	  <label>Usuario</label>
  	  <input type="text" name="nome" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  		<label>Telefone</label>
  		<input type="text" name="telefone">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Senha</label>
  	  <input type="password" name="senha">
  	</div>
  	<div class="input-group">
  	  <label>Confirmar senha</label>
  	  <input type="password" name="confirSenha">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Cadastrar</button>
  	</div>
  	<p>
  	Já tem conta? <a href="login.php">Entrar</a>
  	</p>
  </form>
</body>
</html>