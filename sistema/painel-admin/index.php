<?php
require_once('verificar.php');
echo 'Painel Admin <br>';
echo $_SESSION['nome'];
echo $_SESSION['id'];

?>
<br>
<a href="../logout.php">Sair</a>