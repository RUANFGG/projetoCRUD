<?php
session_start();

include("conexao.php");

if(empty($_POST['email']) || empty($_POST['senha'])){
    header("Location: acesso.php");
}


$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query="SELECT * FROM cadastro.cadastro where email='$email' and md5('$senha')";


$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);


if($row == 1){
    $_SESSION['email'] = $email;
    header('Location: painel.php');
    exit();
}else{
    $_SESSION['nao_autenticado'] = true;
    header('Location: acesso.php');
    exit();

}

?>
