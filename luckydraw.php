<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER"); #openshift
$dbname = getenv("DATABASE_NAME"); #sampledb
$dbpwd = getenv("DATABASE_PASSWORD"); #password
$namelist = "";
$sql = "select username from registryuser where username not in (select username from winner)";
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));

if ($rs=mysql_query($sql)){
    while($row=mysqli_fetch_assoc($rs)) 
		$namelist=$namelist."'".$row['username']."',";
    $namelist=substr($namelist,0,strlen($namelist)-1);
	mysql_free_resule($res);
}
else 
	echo "执行SQL语句:$sql\n错误：".mysql_error();
mysqli_close($connection);
?>
<script type="text/javascript">
var namelist = [<?=$namelist?>];
function startrun() {
    //clearInterval(timer);
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
    width: 300px;
    font-size: 40px;
    text-align: center;
}
</style>
</head>
<body>

<div id="showname">-----</div>
<form >
<input type="hidden" id="winner" name="winner" value="-----" />

<input type="button" value="开始" onclick="startrun();" />
<input type="button" value="停止" onclick="startrun();" />
</form>
</body>
</html>
