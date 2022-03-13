<html>
    <head>
        <meta charset="utf-8">
        <title>変数</title>
    </head>
<body>

<!-- 以下にPHPを記述 -->
<?php
// 変数
$name = 'ナカノケンイチ';//文字列型(String型)
$age  = 27;//数値型(int型)

echo $name;
echo "<br>";
echo $age;

// var_dump($name);

$sato_age = 30;
$yamada_age = '25';

$total_age = $sato_age+$yamada_age;

var_dump($total_age);
// 結合演算子
$sub_total = $sato_age . $yamada_age;
echo $sub_total;

// おみくじ
$num = rand(1,2);
if($num==1){
    echo 'あたり';
}else{
    echo 'はずれ';
}




?>
<!-- End PHP -->

<ul>
    <li><a href="index.php">戻る</a></li>
</ul>
</body>
</html>