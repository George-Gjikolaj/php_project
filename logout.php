<?php 
//a logout script that destroys the session and redirects to the index page
session_start();
session_unset();
session_destroy();

header("Location: ../index.php?logout=successful");
exit;
?>