<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>計算BMI</title>
</head>
<body>
<?php
if(isset($_GET['height'])){
    echo "身高為:". $_GET['height']. "<br>";

}

if(isset($_GET['weight'])){
    echo "體重為:". $_GET['weight']. "<br>";
}

$bmi=round($_GET['weight']/($_GET['height']*$_GET["height"]),2);
echo "BMI為:" . $bmi . "<br>";
?>
<a href="index.php">返回首頁</a>
</body>
</html>