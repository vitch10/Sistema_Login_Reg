<?php
require_once("../models/usuario_model.php");
session_start();


 // initializando variavél
  $username = "";
  $email    = "";
  $errors = array();

// Conectar no banco de dados
 $db = mysqli_connect('localhost', 'root', '', 'login');

// Cadastro de usuario
if (isset($_POST['reg_user'])) {

  // recebe todas as entradas de valores para o formulário
  $username = mysqli_real_escape_string($db, $_POST['nome']);
  $telefone = mysqli_real_escape_string($db, $_POST['telefone']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['senha']);
  $password_2 = mysqli_real_escape_string($db, $_POST['confirSenha']);
 

  // validação de formulário: verifique se o formulário foi preenchido corretamente ...
  // adicionando (array_push ()) o erro correspondente na matriz $ errors
  if (empty($username)) { array_push($errors, "Favor preencher o Nome"); }
  if (empty($telefone)) { array_push($errors, "Favor preencher o Telefone"); }
  if (empty($email)) { array_push($errors, "Favor preencher o Email"); }
  if (empty($password_1)) { array_push($errors, "Favor preencher a Senha"); }
  if ($password_1 != $password_2) {
	array_push($errors, "As duas senha não combinam");
  }

  // Verificar o banco de dados para ter certeza
  // que o usuario não existe com o mesmo nome/senha
  $user_check_query = "SELECT * FROM usuarios WHERE nome='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // Se usuario já existe
    if ($user['nome'] === $username) {
      array_push($errors, "Usuario já existe");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email já existe");
    }
  }

  // Depois, cadastrar usuario se não tem erro
  if (count($errors) == 0) {
  	$password = md5($password_1);//codificar a senha antes de guardar no banco de dados

  	$query = "INSERT INTO usuarios(nome, telefone, email, senha)
  			  VALUES('$username', '$telefone','$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['nome'] = $username;
  	$_SESSION['success'] = "Bem-vindo";
  	header('location: ../view/index.php');
  }
}
 

 // LOGIN usuario

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['nome']);
  $password = mysqli_real_escape_string($db, $_POST['senha']);

  if (empty($username)) {
  	array_push($errors, "Favor preencher o Usuario");
  }
  if (empty($password)) {
  	array_push($errors, "Favor preencher a Senha");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM usuarios WHERE nome='$username' AND senha='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['nome'] = $username;
  	  $_SESSION['success'] = "Bem-vindo";
  	  header('location: ../view/index.php');
  	}else {
  		array_push($errors, "Usuario ou senha incorreta");
  	}
   }
  }
 



?>

