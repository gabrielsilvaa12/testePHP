<?php
session_start();

$_SESSION = array();

session_destroy();

header("Location: ../Frontend/index.html");
exit;
