<?php
session_start();
unset($_SESSION['auth']);
unset($_SESSION['name']);
unset($_SESSION['username']);
unset($_SESSION['passport']);
session_destroy();
header("Location: index.php");
