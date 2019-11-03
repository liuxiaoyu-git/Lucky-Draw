<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER"); #openshift
$dbname = getenv("DATABASE_NAME"); #sampledb
$dbpwd = getenv("DATABASE_PASSWORD"); #password

$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$sql = "select username,round from winner order by round";
$rs = $connection->query($sql);
echo "<table><tr><td>奖项</td><td>中奖人</td></tr>";
while($row = mysqli_fetch_assoc($rs))
	echo "<tr><td>".$row['round']."</td><td>".$row['username']."</td></tr>";
echo "</table>";                 
mysqli_close($connection);
?>
