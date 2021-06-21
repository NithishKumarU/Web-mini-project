<?php

include("db.php");
session_start();
if($_SESSION['userid']){
  session_start();
  session_unset();
  session_destroy();
  session_write_close();
  setcookie(session_name(),'',0,'/');
  session_regenerate_id(true);
  echo '<script>window.location= "login.php"</script>';
}



?>