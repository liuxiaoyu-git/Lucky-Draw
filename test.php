<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER"); #openshift
$dbname = getenv("DATABASE_NAME"); #sampledb
$dbpwd = getenv("DATABASE_PASSWORD"); #password
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));

$sql = "select username from registryuser where username not in (select username from winner)";
$rs = $connection->query($sql);

while($row = mysqli_fetch_assoc($rs))
    echo $row[0]."<br/>"; 

mysql_free_result($rs);
mysqli_close($connection);
