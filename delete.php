<?php

include("db.php");

 session_start();
 if (isset($_SESSION['userid']))
 {
    #
 }
 else
 {
    echo '<script>window.location= "login.php"</script>';
 }

 $id = $_GET['id'];
 $sql = "DELETE FROM cart WHERE id = $id"; 
 mysqli_query($conn, $sql);
 echo '<script>window.location= "re.php"</script>'

?>