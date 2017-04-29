<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php include "koneksi.php";?>

<?php
$data = $_POST['nickname'];

$disp = mysql_query("SELECT nickname FROM tb_nickname WHERE nickname='$data'");
$r = mysql_fetch_array($disp);
$text = $r['nickname'];

if (($data !=null) && ($text==null))  {mysql_query("INSERT INTO tb_nickname (nickname) VALUES ('$data')");
echo "data berhasil ditambahkan ke database";}
else {echo "maaf data yang Anda inputkan keliru atau sudah ada di database";}
?>
<script>
	redirTime = "700";
	redirURL = "index.php";
	self.setTimeout("self.location.href = redirURL;",redirTime);
</script>;

</body>
</html>
