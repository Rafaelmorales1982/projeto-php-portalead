<?php
@session_start();
@session_destroy();//destroy a seção e volta para index.php principal
echo "<script> window.location='./index.php'</script>";//abre index.php principal


?>