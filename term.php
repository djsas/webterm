<?php
session_start();
if(isset($_SESSION["login"]) && $_SESSION["login"]){ 
	$res = false;
	$res = exec("tail history.txt");
	if($res){
		$tmp = explode("\t", $res);
		$i = intval($tmp[0]) + 1;
	}else{
		$i = 1;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja"> 
   <head> 
   <title>Webterm</title> 
   <meta http-equiv="content-type" content="text/html; charset=EUC-JP" /> 
   <link rel="shortcut icon" href="favicon.ico" />
<script type="text/javascript">
	 var histnum = <?= $i; ?>;
</script>

<style type="text/css">
#term{
background-color:black;
color:lime;
height:600px;
width:800px;
overflow:scroll;
}
#cmd{
background-color:black;
color:lime;
width:800px;
}
.res{ color:white; }
</style>
 
   <script type="text/javascript" src="webterm.js" charset="EUC-JP"></script> 
   </head>
   <body>
<div id="term"></div>
<input type="text" id="cmd" value="" />

</body>
</html>

<?php }else{ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja"> 
   <head> 
   <title>Webterm</title> 
   <meta http-equiv="content-type" content="text/html; charset=EUC-JP" /> 
   <link rel="shortcut icon" href="favicon.ico" />

   </head>
   <body>login error.</body>
</html>
					 <?php } ?>
