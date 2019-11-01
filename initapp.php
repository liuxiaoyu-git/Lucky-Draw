
<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER"); #openshift
$dbname = getenv("DATABASE_NAME"); #sampledb
$dbpwd = getenv("DATABASE_PASSWORD"); #password
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$sql = "delete from registryuser";
if ($connection->query($sql) !== TRUE) {  
    echo "发生数据库操作错误";  
} 
$sql = "delete from winner";
if ($connection->query($sql) !== TRUE) {  
    echo "发生数据库操作错误";  
} 
mysqli_close($connection);
echo "数据清理完毕。";
?>
