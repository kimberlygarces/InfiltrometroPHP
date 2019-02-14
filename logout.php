
<?php
  session_start();
  session_unset();
  session_destroy();
 header("Location: http://localhost/proyectos/php/infiltrometro/login.php"); 
?>