<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER"); #openshift
$dbname = getenv("DATABASE_NAME"); #sampledb
$dbpwd = getenv("DATABASE_PASSWORD"); #password
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$winner=$_POST['winner']; 
$round=$_POST['round'];

//将可以抽奖的人员复制到抽奖表
$sql = "insert into winner values('".$winner."','".$winner."')";
echo $sql;
$connection->query($sql);'
mysqli_close($connection);
?>
