<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>チャット</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Main[Start] -->
<form method="POST" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>チャットフォーム</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label><textArea name="body" rows="1" cols="30"></textArea></label>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->





<?php
//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=ymt_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．SQL文を用意(データ取得：SELECT文)
$stmt = $pdo->prepare("SELECT * FROM chat_table");
$status = $stmt->execute();

//３．データ表示
$view="";//空っぽの変数viewを作成（ここにHTMLタグを追加していく）

if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //「2.」で取得したデータの数だけ自動でループしてくれるwhile文
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC));
  $json = json_encode($result);

}
?>
<script>
  const data = JSON.parse('<?=json?>');
  console.log(data);
</script>

<!-- チャット内容の表示エリア -->
<!-- <div class=" jumbotron"><?php echo $view ?></div> -->


</body>
</html>
