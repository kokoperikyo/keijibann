
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title></title>
</head>
<body>
<?php
try {
$mysqli = new PDO('mysql:host=localhost;dbname=co_415_it_3919_com;charset=utf8','co-415.it.3919.c','Uvk7VCut',
array(PDO::ATTR_EMULATE_PREPARES => false));
echo 'データベース接続成功。';
} catch (PDOException $e) {
 exit('データベース接続失敗。'.$e->getMessage());
}

?>

</body>
</html>