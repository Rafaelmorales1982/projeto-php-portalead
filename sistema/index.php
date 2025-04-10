<?php


//CRIAR UM USUÁRIO  ADMINISTRADOR CASO NÃO EXITA NENHUM USUÁRIO
require_once('conexao.php');
//$pdo esta dentro conexao.php 
// -> esse sinal chamada de interpolação 
$senha = '123';
$senha_crip = md5($senha); //criando senha criptografando

//VERIFICAR SE EXISTE UM USUÁRIO ADMINISTRADOR NO BANCO CONSULTA TIPO SELECT
//criando variável sempre ($query) para receber a consulta
//sempre utilizar os dois códigos para fazer uma consulta a $query e do $res
$query = $pdo->query("SELECT * FROM usuarios WHERE nivel = 'Administrador'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
//MOSTRA RESULTADO
//echo count($res); //quantidade de linha no banco verifica quantidade de usuário admin
if (@count($res) == 0) { ///se não tiver registro ele cria
  $pdo->query("INSERT INTO usuarios SET nome = 'Administrador',
  cpf = '000.000.000-00', usuario = '$email_sistema',
   senha = '$senha', senha_crip = '$senha_crip',
    nivel='Administrador', foto = 'sem-perfil.pg', id_pessoa = 1, ativo = 'Sim',
    data = curDate()  ");
  //curDate() pega hora atual
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal Cursos</title>
</head>

<body>

  <!--1° formulário -->
  <form method="POST" action="autenticar.php">
    <input type="text" name="usuario" placeholder="Email ou CPF">
    <input type="password" name="senha" placeholder="Digite a sua senha">

    <button type="submit">Logar</button>
  </form>

</body>

</html>