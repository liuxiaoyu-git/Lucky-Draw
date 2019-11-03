<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER"); #openshift
$dbname = getenv("DATABASE_NAME"); #sampledb
$dbpwd = getenv("DATABASE_PASSWORD"); #password
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
for ($i=1; $i<=10; $i++){
  $sql = "insert into registryuser values('user".$i."-0001')";
  if ($connection->query($sql) !== TRUE) {  
      echo "发生数据库操作错误";  
  } 
}
$sql = "insert into winner values('user3-0001','special prize')";
if ($connection->query($sql) !== TRUE) {  
    echo "发生数据库操作错误";  
} 
mysqli_close($connection);
echo "测试数据加载完毕。";
?>
