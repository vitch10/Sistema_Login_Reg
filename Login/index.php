<?php \
  session_start(); 

  if (!isset($_SESSION['nome'])) {
  	$_SESSION['msg'] = "Tem que logar primeiro";
  	header('location:login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['nome']);
  	header('location:login.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../view/estilo.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notificação de messagem -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- informações do usuário logado -->
    <?php  if (isset($_SESSION['nome'])) : ?>
    	<p>Bem-vindo <strong><?php echo $_SESSION['nome']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">Sair</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>