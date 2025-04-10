<?php
//DEFINIR TEMPO LIMITE PARA FECHAR A SEÇÃO
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

session_cache_expire(120);
$cache_expire = session_cache_expire();

@session_start();
//Estartar a seção session strat para utilizar as variáveils de session globalmente
//para utilizar $query = $pdo->query("SELECT *) -> tenho que trazer a require da conexao.php
require_once('conexao.php');

//Mostrando os dados
 $usuario = $_POST['usuario']; //dentro tag input name="usuario" 
 $senha =  $_POST['senha'];//dentro tag input name="senha"
$senha_crip = md5($senha);

//FAZER CONSULTA SE EXISTE EMAIL E SENHA NO BANCO DE DADOS SE TEM ESSES DADOS NO BANCO DE DADOS
$query = $pdo->query("SELECT * FROM usuarios WHERE (cpf = '$usuario' or
 usuario = '$usuario') and senha = '$senha' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
//MOSTRA RESULTADO
//echo count($res); //quantidade de linha no banco verifica quantidade de usuário admin
if (@count($res) > 0) { ///se não tiver registro ele cria
 //verifica o nivel do usuário
 @$_SESSION['nivel'] = $res[0]['nivel'];
 @$_SESSION['cpf'] = $res[0]['cpf'];
 @$_SESSION['id'] = $res[0]['id'];
 @$_SESSION['nome'] = $res[0]['nome'];

 if(@$_SESSION['nivel'] == 'Administrador'){
  echo "<script> window.location='painel-admin'</script>";//abre painel admin se o nivel for Administrador
 }

 if(@$_SESSION['nivel'] == 'Professor'){
  echo "<script> window.location='painel-professor'</script>";//abre painel Professor se o nivel for Professor
 }

 if(@$_SESSION['nivel'] == 'Aluno'){
  echo "<script> window.location='painel-aluno'</script>";//abre painel Aluno se o nivel for Aluno
 }

}else {
  echo "<script> window.alert('Dados Incorretos!')</script>";//não for Administrado vai mostrar alerta de dados incorretos
  echo "<script> window.location='./index.php'</script>";//abre index.php principal

}
?>