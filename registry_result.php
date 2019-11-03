<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER"); #openshift
$dbname = getenv("DATABASE_NAME"); #sampledb
$dbpwd = getenv("DATABASE_PASSWORD"); #password
$username = $_POST['username'];
$code = $_POST['code'];
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$sql = "insert into registryuser values(".$registryuser.",".$code.")";
if ($connection->query($sql) !== TRUE) 
  echo "发生数据库操作错误或用户".$username."已经存在";  
} esle {
	echo "抽奖用户注册成功。";
	echo "<br/>用户名：".$username;
	echo "<br/>手机后4位：".$code;
}
mysqli_close($connection);
?>
