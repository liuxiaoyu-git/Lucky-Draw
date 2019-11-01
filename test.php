<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER"); #openshift
$dbname = getenv("DATABASE_NAME"); #sampledb
$dbpwd = getenv("DATABASE_PASSWORD"); #password
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));

$sql='select username from registryuser where username not in (select username from winner)';
if ($res=mysql_query($sql)){
    while($row=mysql_fetch_array($res)) 
      $result[]=$row;
    mysql_free_resule($res);
}
else 
  echo "执行SQL语句:$sql\n错误：".mysql_error();

echo '查询结果在下面的额为数组里面:<pre>';
print_r($result);
echo '</pre>';
