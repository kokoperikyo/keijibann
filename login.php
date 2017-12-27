<?php
require('dbconnect.php');
session_start();




if (!empty($_POST)) {

	if ($_POST['name'] != '' && $_POST['password'] != '') {
	$output='SELECT * FROM member';
	$res=$mysqli->query($output);
	foreach($res as $row){

		if ($_POST['name'] == $row['name'] && $_POST['password'] == $row['password']) {

			$_SESSION['id'] = $row['id'];

			$_SESSION['time'] = time();


		
		header('Location: board.php');
		exit();

		} else {
			$error['login'] = 'failed';
		
	  }
	}
	}	
	else {
		$error['login'] = 'blank';
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>ログインする</title>
</head>

<body>
<div id="wrap">
	<div id="head">
		<h1>ログインする</h1>
	</div>
	<div id="content">
		<div id="lead">
			<p>メールアドレスとパスワードを記入してログインしてください。</p>
			<p>入会手続きがまだの方はこちらからどうぞ。</p>
			<p>&raquo;<a href="registration_mail_form.php/">入会手続きをする</a></p>
		</div>
	<form action="" method="post">
		<dl>
			<dt>名前</dt>
			<dd>
			<input type="text" name="name" size="35" maxlength="255" value="<?php echo htmlspecialchars($_POST['name']); ?>" />
			<?php if ($error['login'] == 'blank'): ?>
			<p class="error">* メールアドレスとパスワードをご記入ください</p>
			<?php endif; ?>
			<?php if ($error['login'] == 'failed'): ?>
			<p class="error">* ログインに失敗しました。正しくご記入ください。
			</p>
			<?php endif; ?>
		</dd>
		<dt>パスワード</dt>
		<dd>
			<input type="password" name="password" size="35" maxlength="255" value="<?php echo htmlspecialchars($_POST['password']); ?>" />
		</dd>

		</dl>
		<div><input type="submit" value="ログインする" />
		</div>
	</form>
</div>


</div>
</body>
</html>
