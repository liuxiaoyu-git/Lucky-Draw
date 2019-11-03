<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER"); #openshift
$dbname = getenv("DATABASE_NAME"); #sampledb
$dbpwd = getenv("DATABASE_PASSWORD"); #password
$namelist = "";
$sql = "select username from registryuser where username not in (select username from winner)";
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$rs=$connection->query($sql);
while($row = mysqli_fetch_assoc($rs))
	$namelist .= "'".$row['username']."',";
$namelist=substr($namelist,0,strlen($namelist)-1);

echo $namelist;
mysqli_close($connection);
?>
<script type="text/javascript">
var namelist = [<?=$namelist?>];
//var namelist = ["liuxioayu","baoli"];

function startrun() {
    var index;
    setInterval(function(){
        index = Math.floor(Math.random()*namelist.length);
        document.getElementById("showname").innerHTML = namelist[index];
        document.getElementById("winner").value = namelist[index];
    }, 30);
}
</script>

<html>
<head>
<style type="text/css">
#showname  {
    border: 3px solid #006;
    clolr: #FF0000;
    width: 400px;
    font-size: 40px;
    text-align: center;
}
</style>
</head>
<body>

<div id="showname">-----</div>
<form action=luckydraw_result.php method=post>
<input type="hidden" id="winner" name="winner" value="-----" />
<input type="button" value="开始" onclick="startrun();" />
<input type="submit" value="停止" />
</form>
</body>
</html>
