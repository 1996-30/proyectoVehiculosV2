<?php
session_start();
session_unset();
session_destroy(); ///destruye la session

header("Location:index.php");
exit();

?>