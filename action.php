<?php

include('conf.php');

$query = "INSERT INTO user (email, uname) VALUES ('$_POST[email]','$_POST[uname]')";

$statement = $con->prepare($query);
$statement->execute();
header('Location: index.php');
?>