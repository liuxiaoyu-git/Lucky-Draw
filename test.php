<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER"); #openshift
$dbname = getenv("DATABASE_NAME"); #sampledb
$dbpwd = getenv("DATABASE_PASSWORD"); #password
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));

//清空抽奖表
$sql = "delete from TEMPLUCKYDRAW";
$connection->query($sql);

//将可以抽奖的人员复制到抽奖表
$sql = "insert into TEMPLUCKYDRAW select (@rowno:= @rowno+1) AS rowno, username from registryuser, (SELECT @rowno:=0) as rowno where username not in (select username from winner)";
$connection->query($sql);

//获得可抽奖的总人数$count
$sql = "select count(*) as count from TEMPLUCKYDRAW";
$rs = $connection->query($sql);
$row = mysqli_fetch_assoc($rs);
$count = $row['count'];
echo $count;
//$num_rows = mysql_num_rows($rs);

//抽奖，随机产生中奖号
$winner_row=rand(1,$count); 
echo "winner_row";
echo $winner_row;

$sql = "select username from TEMPLUCKYDRAW where sn=".$winner_row;
echo $sql;

$rs = $connection->query($sql);
$row = mysqli_fetch_assoc($rs);
echo $row['username']; 
/*
//$sql = "create table TEMPLUCKYDRAW as select (@rowno:= @rowno+1) AS rowno, username from registryuser, (SELECT @rowno:=0) as rowno where username not in (select username from winner)";
//$sql = "drop table TEMPLUCKYDRAW";
//$sql = "select (@rowno:= @rowno+1) AS rowno, username from registryuser, (SELECT @rowno:=0) as rowno where username not in (select username from winner) and rowno=".$num_winner;


//while($row = mysqli_fetch_assoc($rs))
//   echo $row['username']."<br/>"; 
*/
mysqli_close($connection);
