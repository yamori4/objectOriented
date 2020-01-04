<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['loginFlag'])==false){
	print 'ログインされていません。<br />';
	print '<a href="./facade/index.html">ログイン画面へ</a>';
	exit();
}else{
	print 'ログイン中<br />';
	print '<hr>';
	print '<br />';
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>オブジェクト指向演習</title>
</head>
<body>

<h1>ホーム画面</h1><br />


<a href="./templateMethod/index.php">
■Template Method ≪ディスプレイのテンプレートを用意しよう≫</a><br />
<br />

<a href="./factoryMethod/index.php">
■Factory Method ≪ファイルから商品データを読みこもう≫</a><br />
<br />

<a href="./iterator/index.php">
■Iterator ≪商品データに対する反復操作で、商品の一覧を表示しよう≫</a><br />
<br />

<a href="./composite/index.php">
■Composite ≪ツリー構造で商品データを表示しよう≫</a><br />
<br />

<a href="./strategy/index.php">
■Strategy ≪戦略を切り替えよう≫</a><br />
<br />

<a href="./bridge/index.php">
■Bridge ≪機能と実装を繋げて、商品を並べ替えよう≫</a><br />
<br />

<a href="./observer/index.php">
■Observer ≪買い物かごの中身を観てみよう≫</a><br />
<br />

<a href="./decorator/index.php">
■Decorator ≪購入する商品を包装しよう≫</a><br />
<br />

<a href="./singleton/index.php">
■Singleton ≪商品の注文履歴をファイルに書き出そう≫</a><br />
<br />


<a href="./facade/logout.php">
◆ログアウト</a><br />
</body>
</html>