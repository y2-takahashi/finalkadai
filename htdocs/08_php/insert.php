<?php
//1. POSTデータ取得
$name = $_POST['name'];
$body = $_POST['body'];

//2. DB接続します
try {
  //Password:MAMP='root''
  $pdo = new PDO('mysql:dbname=ymt_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成(INSERT文)
$stmt = $pdo->prepare("INSERT INTO chat_table(id,name,body,indate) VALUES(NULL,:name,:body,sysdate() )");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':body', $body, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMassage:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header('Location: index.php');//ヘッダーロケーション（リダイレクト）

}
?>
