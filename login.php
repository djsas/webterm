<?php
if($_POST["send"]){
	session_start();

	// check with blacklist
	/*
	foreach(array($_GET, $_POST, $_COOKIE) as $arr){
		if(!empty($arr['_SESSION']) || !empty($arr['_COOKIE']) || !empty($arr['_SERVER']) || !empty($arr['_ENV']) || !empty($arr['_FILES']) || !empty($arr['_POST']) || !empty($arr['_GET']) || !empty($arr['_GLOBALS'])) exit();
	}
	*/

	$_SESSION["login"] = $_POST["passwd"] === "ここにパスワードが入ります。";
	header("Location:term.php");
 }



?>