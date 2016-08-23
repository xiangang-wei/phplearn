<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Hello world!</h1>
<?php 
  $x= 5;
  $y= 10;
  function addNum()
  {
  	# code...
  	global $x,$y;
  	echo $y.PHP_EOL;
 // 	echo "<br>";
  	$y= $x+ $y;
  	echo $y+$x;
  	echo "<br>";
  	$GLOBALS["y"]= 100;

  }
  addNum();
  echo PHP_EOL;
  echo $y;

  	echo $_SERVER['PHP_SELF'];
	echo "<br>";
	echo $_SERVER['SERVER_NAME'];
	echo "<br>";
	echo $_SERVER['HTTP_HOST'];
	echo "<br>";
	echo $_SERVER['HTTP_REFERER'];
	echo "<br>";
	echo $_SERVER['HTTP_USER_AGENT'];
	echo "<br>";
	echo $_SERVER['SCRIPT_NAME'];
	echo "<br>";
	echo $_SERVER['SERVER_ADDR'];
	echo "<br>";
	echo _FILE_;	

?>
</body>
</html>