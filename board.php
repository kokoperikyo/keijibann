<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
require('dbconnect.php');
	var_dump($post["name"]);
if (isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
	// ログインしている
	$_SESSION['time'] = time();

	$output2='SELECT * FROM member';
	$res2=$mysqli->query($output2);
	foreach($res2 as $members){//$membersはmemberのを格納している。
	
	}

	} else {
	// ログインしていない
	header('Location: login.php');
	exit();
}
if(isset($_POST['submit']) ){
	//動画と画像の仕訳
	// 画像をアップロードする　

	$upfile=$_FILES["upfile"]["tmp_name"];//サーバー側のファイルの認識
	$filename = $_FILES['upfile']['name'];
if ($upfile==""){
  print("ファイルのアップロードができませんでした。<BR>");
  echo '<a href="board.php">戻る</a>';
  exit;
 }


// ファイルアップロードの処理をする
$mime = substr($file['name'], -4);
if ($mime == '.gif' || $ext == '.jpg' || $ext == '.png') {


	$imgdat = file_get_contents($upfile);//fileの中身（バイナリデータ）
	$imgdat = mysql_real_escape_string($imgdat);//安全性

}
}
// 投稿を記録する
//if (!empty($_POST)) {
	//if ($_POST['comment'] != '') {


	$input2=$mysqli->prepare("INSERT INTO Bboard3 (comment, id, file_name, file_content) VALUES (:comment, :id, :file_name, :file_content)");
	$input2->execute(array(':comment' => $_POST['comment'], ':id' => $members['id'],  ':file_name'=> $mime, ':file_content' => $imgdat));
	
	//header('Location: index.php');
	//exit();
	//}
//}

// 投稿を取得する
$output=sprintf("SELECT m.name, b.* FROM member m, Bboard3 b WHERE m.id=b.id");
$posts=$mysqli->query($output);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>ひとこと掲示板</title>
</head>

<body>
<div id="wrap">
	<div id="head">
		<h1>ひとこと掲示板</h1>
	</div>
	<div id="content">
	<form action="" method="post" enctype="multipart/form-data">
		<dl>
			<dt><?php echo htmlspecialchars($members['name']); ?>さん、メッセージをどうぞ</dt>
			<dd>
			<textarea name="comment" cols="50" rows="5"></textarea>
			</dd>

			<dt>ファイル</dt>
			<dd>
			<input type="file" name="upfile" />
			</dd>
		</dl>
		<div>
		<p>
			<input type="submit"  name="submit" value="投稿する" />
		</p>
		</div>
	</form>

<?php
foreach($posts as $post){


	echo '<p>' . '<div class="msg">' . $post["comment"] . '<span class="name">' . '(' . $post["name"] . ')' . '</span>' . '</p>';

	print("<img src=\"imgGet.php?id=" . "\">");

	echo '</div>';
};
?>


</body>
</html>
