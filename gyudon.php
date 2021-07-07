<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ねぎ玉牛丼セット自動編成ツール</title>

<link rel="stylesheet" type="text/css" href="stylesheet.css">


</head>
<body>
 <div class="header">
 </div>

 
<div class="eyecatch" style="text-align:center;"> 
<img src="negi.png"  border="3px" alt="ねぎ玉牛丼のイラスト">
</div>

<div class="neginput">
 <form action="NEGITAMA.php" method="post">
 <p>ほんじつのご予算は？(550~1230円の間で指定すること）</p>
 <input type="number" name="negiprice"><br>
 <input type="submit" value="スキる">
 </form>
</div>


<?php
error_reporting(E_ALL & ~E_NOTICE);
class menu{
 public $value;
 public $name;
 public function __construct($value,$name){
     $this->name=$name;
     $this->value=$value;
 }
}
$minigyu=new menu(420,"ミニ");
$namigyu=new menu(480,"並盛");
$chugyu=new menu(610,"中盛");
$oogyu=new menu(610,"大盛");
$tokugyu=new menu(760,"特盛");
$megagyu=new menu(910,"メガ");

$gyuudons=array($minigyu, $namigyu, $chugyu, $oogyu, $tokugyu, $megagyu);

$asaoshi=new menu(260,"【あさり汁】おしんこセット");
$asathreept=new menu(280,"【あさり汁】3点セット");
$asapota=new menu(320,"【あさり汁】ポテトサラダセット");
$asahealth=new menu(300,"【あさり汁】健康セット");
$asaegg=new menu(240,"【あさり汁】たまごセット");
$asasala=new menu(240,"【あさり汁】サラダセット");
$asaoku=new menu(320,"【あさり汁】オクラサラダセット");

$oshi=new menu(150,"おしんこセット");
$threept=new menu(170,"3点セット");
$pota=new menu(210,"ポテトサラダセット");
$health=new menu(190,"健康セット");
$egg=new menu(130,"たまごセット");
$sala=new menu(170,"サラダセット");
$oku=new menu(210,"オクラサラダセット");

$tonoshi=new menu(260,"【とん汁】おしんこセット");
$tonthreept=new menu(280,"【とん汁】3点セット");
$tonpota=new menu(320,"【とん汁】ポテトサラダセット");
$tonhealth=new menu(300,"【とん汁】健康セット");
$tonegg=new menu(240,"【とん汁】たまごセット");
$tonsala=new menu(280,"【とん汁】サラダセット");
$tonoku=new menu(320,"【とん汁】オクラサラダセット");

$setmenu=array(
    $asaoshi,$asathreept,$asapota,$asahealth,$asaegg,$asasala,$asaoku,
    $oshi,$threept,$pota,$health,$egg,$sala,$oku,
    $tonoshi,$tonthreept,$tonpota,$tonhealth,$tonegg,$tonsala,$tonoku);



// echo "今日のあなたのねぎ玉牛丼は ".$gyuudons[$resultgyu]->name." ＋ ".$setmenu[$resultset]->name."でいかがですか？";
?>






<?php
$negiprice = $_POST['negiprice'];
// $gyukey = array_rand($gyuudons);
// $sidekey = array_rand($setmenu);

if ($negiprice==""){
    echo "<div class=yourmeal><center>未入力</center></div>";
}
elseif ($negiprice<550){
    echo "<div class=yourmeal><center>最低価格を超えていません</center></div>";
}
else{
    while (TRUE){
        $num_of_gyu = count($gyuudons);
        $resultgyu = rand(0, $num_of_gyu -1);

        $num_of_set = count($setmenu);
        $resultset = rand(0, $num_of_set -1);

        $menusum = $gyuudons[$resultgyu]->value + $setmenu[$resultset]->value;
        if( $menusum<=$negiprice){
        echo "<div class=yourmeal><center>今日のあなたのねぎ玉牛丼は<br> <b>".$gyuudons[$resultgyu]->name." ＋ ".$setmenu[$resultset]->name."</b><br>でいかがですか？(".$menusum."円)</center></div>";
        break;
        }
    }
}
?>
</body>
</html>
