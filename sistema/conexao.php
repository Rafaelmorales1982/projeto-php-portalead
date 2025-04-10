<?php
//Informações que precisamos
// declarando variáveis para coletar essas informações
$usuario = 'root';
$senha = '';
$banco = 'portal';
$servidor = 'localhost:4306';

try{
$pdo = new PDO("mysql:dbname=$banco; host=$servidor", "$usuario","$senha");

} catch(Exception $e) {
 echo 'Erro ao conectar ao bano de dados <br><br>'.$e;
}

//CRIANDO VARIÁVEIS DO SISTEMA
$nome_sistema = 'Portal Debora Balico Cursos';
$email_sistema = 'deborabalico@gmail.com';

?>
