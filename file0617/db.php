<?php

$dsn="mysql:host=localhost;dbname=files0617;charset=utf8";
$pdo=new PDO($dan,'root','');

function all($table,$array=null,$str=null){
    global $pdo;

    $sql="select * from $table";

    if(is_array($array)){
        $tmp=array2sql($array);
        $sql=$sql." where ".join(" and ",$tmp);
    }else{
        $sql .=$array;
    }

    $sql .=$str;

    $rows=$pdo->query($sql)->FetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function array2sql($array){
    $tmp=[];
    foreach($array as $key =>$value){
        $tmp[]="`$key`=`$value`";
    }

    return $tmp;
}