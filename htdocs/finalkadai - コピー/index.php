<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>copyMyPoem</title>
</head>
<body>
    <form method="どの通信メソッドで" action="どこへ">
        <div class="jumbotron">
            <fieldset>
                <legend>あなたのことを教えてください</legend>
                <label>名前：<input type="text" name="name"></label><br>
                <label><textArea name="body" rows="1" cols="30"></textArea></label>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <div class="contents">
        <div class="gazou">画像</div>
        <div class="mozi">文字</div>
    </div>
    <?php
//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=mypoem;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．SQL文を用意(データ取得：SELECT文)
$stmt = $pdo->prepare("SELECT * FROM poem");
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
</body>
</html>