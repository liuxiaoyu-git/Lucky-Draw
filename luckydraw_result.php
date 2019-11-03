<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER"); #openshift
$dbname = getenv("DATABASE_NAME"); #sampledb
$dbpwd = getenv("DATABASE_PASSWORD"); #password
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$winner=$_POST['winner']; 
$round=$_POST['round'];

$sql = "insert into winner values('".$winner."','".$round."')";
$sql1="insert into winner values('user1-0001','thirdprize')";
echo "<br/>1:";
echo $sql;
echo "<br/>2:";
echo $sql1;
echo "<br/>3:";
echo ($sql==$sql1);
echo "<br/>4:";
echo ($sql===$sql1);
echo "<br/>5:";
echo ($sql===$sql1);
echo "<br/>6:";
echo strcmp($sql,$sql1);
$connection->query($sql1);
mysqli_close($connection);
echo "恭喜 ".$winner." 中奖了";
?>
