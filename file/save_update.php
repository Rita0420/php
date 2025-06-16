<?php
include_once "db.php";

if(!empty($_FILES['name']['tmp_name'])){
    $name=$_FILES['name']['name'];
    move_uploaded_file($_FILES['name']['tmp_name'],'./files/'.$name);
    $_POST['name']=$name;
}

$type=$_POST['type'];
$description=$_POST['description'];

save('uploads',$_POST);

header("location:manage.php?msg=檔案編輯成功，檔名為:".$name);
?>