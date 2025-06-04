<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>迴圈畫星星</title>
</head>
<body>
    <h2>三角形</h2>
<?php
// 設最多幾個星星
$stars=10;
// 就顯示上來看，i是跑直的，j是橫的
// i從0開始算且i會小於stars，每迴圈+1
for($i=0;$i<$stars;$i++){
    // j從0開始算且j會小於stars，每迴圈+1
    for($j=0;$j<$stars;$j++){
        // 假如i>=j時才會有*
        if($i>=$j){
            echo"*";
        }
    }
    // 每跑一橫就換行
    echo "<br>";
}
?>
<?php
for($i=4;$i>=0;$i--){
    for($j=0;$j<5;$j++){
        if($i<=$j){
            echo"*";
        }
    }
    echo "<br>";
}
?>

<h2>倒三角形</h2>
<?php
for($i=0;$i<5;$i++){
    for($j=0;$j<5;$j++){
        if($i<=$j){
            echo"*";
        }
    }
    echo "<br>";
}

?>
<?php
for($i=4;$i>=0;$i--){
    for($j=0;$j<5;$j++){
        if($i>=$j){
            echo"*";
        }
    }
    echo "<br>";
}
?>

<h2>正三角形</h2>
<style>
    *{
        font-family: 'Courier New', Courier, monospace
    }
</style>
<?php
for($i=0;$i<5;$i++){

    for($k=0;$k<5-1-$i;$k++){
        // $nbsp;是顯示出來的空白
        echo"&nbsp;";        
    }

    for($j=0;$j<$i*2+1;$j++){
            echo"*";
    }
    echo "<br>";
}
// 定義要幾層
$stars=15;
for($i=0;$i<$stars;$i++){
// 因為正三角形前面會有空白，所以空白要寫在*前面
// $stars-1是因為要算上面空了幾層再減去$i即為空幾個
    for($k=0;$k<$stars-1-$i;$k++){
        // $nbsp;是顯示出來的空白
        echo"&nbsp;";        
    }
// 每層幾個星星
    for($j=0;$j<$i*2+1;$j++){
            echo"*";
    }
    echo "<br>";
}
?>

<h2>菱形</h2>
<style>
    *{
        font-family: 'Courier New', Courier, monospace
    }
</style>
<?php
//定義要幾層
$stars=10;
// 預防輸入不是奇數，所以把stars除以2確認餘數為0即為偶數的話讓它+1變為奇數
if($stars%2==0){
    $stars=$stars+1;
}

for($i=0;$i<$stars;$i++){

    if($i<=floor($stars/2)){
        $y=$i;
    }else{
        $y=$stars-1-$i;
    }

    for($j=0;$j<floor($stars/2)-$y;$j++){
        echo "&nbsp;";
    }

    for($k=0;$k<$y*2+1;$k++){
        echo "*";
    }

    echo "<br>";


}
?>

<h3>矩形</h3>
<?php
$w=10;
for($i=0;$i<$w;$i++){
    for($j=0;$j<$w;$j++){
    if($i==0 || $i==$w-1 ||$j==0 || $j==$w-1){
        echo "*";
    }else{
        echo "&nbsp;";
    }
}
    echo "<br>";
}
?>

<h3>對角線矩形</h3>
<?php
$w=7;
for($i=0;$i<$w;$i++){
    for($j=0;$j<$w;$j++){
    if($i==0 || $i==$w-1 ||$j==0 || $j==$w-1 || $i==$j || $i+$j==$w-1){
        echo "*";
    }else{
        echo "&nbsp;";
    }
}
    echo "<br>";
}
?>

<h2>菱形對角線</h2>
<style>
    *{
        font-family: 'Courier New', Courier, monospace
    }
</style>
<?php
//定義要幾層
$stars=15;
// 預防輸入不是奇數，所以把stars除以2確認餘數為0即為偶數的話讓它+1變為奇數
if($stars%2==0){
    $stars=$stars+1;
}

for($i=0;$i<$stars;$i++){
// 觀察規律，為了要讓i形成算式要等於*數量
// 發現i<=在設的stars除以2之後無條件捨去(floor)的整數值是一樣的
    if($i<=floor($stars/2)){
        $y=$i;
// 設y來處理後面的值
    }else{
        $y=$stars-1-$i;
    }

    for($j=0;$j<floor($stars/2)-$y;$j++){
        echo "&nbsp;";
    }

    for($k=0;$k<$y*2+1;$k++){
        if(($y+$k+$j)==floor($stars/2) || 
            abs($y-($k+$j))==floor($stars/2) || 
            $i==floor($stars/2) || 
            ($k+$j)==floor($stars/2)){
        echo "*";
    }else{
        echo "&nbsp;";
    }
    }

    echo "<br>";


}
?>

<h2>尋找字元</h2>

<?php
$string="This is a good day";
$target="y";
$is_find=false;
$counter=0;
while($is_find==false && $counter<strlen($string)){
    
    if($string[$counter]==$target){
        $is_find=true;
    }

    $counter++;

}

if($is_find){

    echo "目標字元".$target."在字串第".$counter."個位置";
}else{

    echo "字串中沒有你要找的".$target;
}

?>

<h2>尋找字元-中文</h2>
<!-- 中文一個字要3個位元 -->
<?php
$string="今天真是個出遊的好日子啊~";
$target="個";
$is_find=false;
$counter=0;
// echo mb_strlen($string);
while($is_find==false && $counter<mb_strlen($string)){
    // echo mb_substr($string,$counter,1);
    // echo "-";
    
    if(mb_substr($string,$counter,1)==$target){
        $is_find=true;
    }
    // echo $counter;
    // echo $is_find;

    $counter++;
    // echo ",";
    // echo $counter;
    // echo "<br>";

}

if($is_find){

    echo "目標字元".$target."在字串第".$counter."個位置";
}else{

    echo "字串中沒有你要找的".$target;
}

?>


<h2>尋找字元-中文詞</h2>
<!-- 中文一個字要3個位元 -->
<?php
$string="今天真是個出遊的好日子啊~";
$target="出遊";
$is_find=0;
$counter=0;
echo $string;
echo "<br>";
echo $target;
echo "<br>";
// echo mb_strlen($string);
while($is_find==0 && $counter<mb_strlen($string)){
    // echo mb_substr($string,$counter,1);
    // echo "-";
    
    if(mb_substr($string,$counter,mb_strlen($target))==$target){
        $is_find=1;
    }
    // echo $counter;
    // echo $is_find;

    $counter++;
    // echo ",";
    // echo $counter;
    // echo "<br>";

}

if($is_find){

    echo "目標字元".$target."在字串第".$counter."個位置";
}else{

    echo "字串中沒有你要找的".$target;
}

?>

<hr>

<?php

echo mb_strpos($string,$target);

?>
</body>
</html>