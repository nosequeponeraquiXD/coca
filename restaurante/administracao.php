<?php

if (isset($_COOKIE['admin'])) {
	header('location:principal.php');
}else{
	header('location: login_admin.php');
}

if (isset($_COOKIE['cliente'])) {
	header('location: index.php');
}

?>