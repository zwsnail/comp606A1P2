<?php
session_start();
unset($_SESSION['therapist_email']);
header("Location: index.php");

?>