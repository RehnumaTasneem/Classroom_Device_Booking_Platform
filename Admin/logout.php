<?php
session_start();
session_destroy();
header("Location: /osproject/index.php");
exit;
?>
