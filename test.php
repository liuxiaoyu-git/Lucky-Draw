<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER"); #openshift
$dbname = getenv("DATABASE_NAME"); #sampledb
$dbpwd = getenv("DATABASE_PASSWORD"); #password
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));

$sql = "select username from registryuser where username not in (select username from winner)";
$rs = mysql_query($sql);
$result = array();

while($row = mysql_fetch_array($rs))
    echo $row[0]."<br/>"; 
    $result[]=$row;

mysql_free_result($rs);
mysqli_close($connection);
