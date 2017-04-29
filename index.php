<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="arifrohmadi">
    <title></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php include 'header.php'; ?>
<h2>NICKNAME CHECKER</h2>

<form action="proses.php" method="post">
Nickname: <label><input type="text" name="nickname" value="" class="form-control"></label>
<input type="submit" name="submit" value="add"  class="btn btn-default">
</form>

<?php
include "koneksi.php";
$disp = mysql_query("SELECT id, nickname FROM tb_nickname");
$i=0;
while ($r=mysql_fetch_array($disp)){
  $id[$i]=$r['id'];
  $nickname[$i]=$r['nickname'];
  $i++;
}
?>

Nickname yang Sama di Database: <br/><br/>
<table class="table-bordered">
<tr><th>No</th><th>Nickname</th><th>Jumlah</th></tr>
<?php
//sorting nickname
array_multisort($nickname,$id);
for ($i=0; $i<sizeof($nickname); $i++){
	$c=1;
	for ($j=0; $j<sizeof($nickname); $j++){
		if (strcasecmp($nickname[$i],$nickname[$j]) == 0)
		{$count[$i]=$c;$c++;}
	}
	if ($count[$i]>1){
  echo "<tr><td>".($id[$i])."</td><td>".$nickname[$i]."</td><td>".$count[$i]."</td></tr>";}
}
?>
</table><br/>

<b>LIST USER YANG TERSIMPAN DALAM DATABASE</b> </br></br>

<table border="1" class="table">
<tr><th>No</th><th>Nickname</th></tr>
<?php
//sorting id
array_multisort($id,$nickname);
for ($i=0; $i<sizeof($nickname); $i++){
echo "<tr><td>".($i+1)."</td><td>".$nickname[$i]."</td></tr>";
}
?>
</table>


<?php include 'footer.php';?>

</body>
</html>

<!--
creator: arifrohmadi
template using simple sidebar (http://startbootstrap.com/template-overviews/simple-sidebar/)
-->
