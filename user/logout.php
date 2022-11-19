<?php
session_start();
session_unset();
session_destroy();
header("Local: ../index.php");
exit();
?>
