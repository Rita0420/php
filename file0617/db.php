<?php

$dsn="mysql:host=localhost;dbname=files0617;charset=utf8";
$pdo=new PDO($dan,'root','');

//撈資料表全部資料
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

//找資料表資料
function find($table,$id){
    global $pdo;
    $sql="select * from $table where ";
    if(is_array($id)){
        $tmp=array2sql($id);
        $sql .=join(" and ",$tmp);    
    }else{
        $sql .="id='$id'";
    }

    $rows=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    return $rows;
}

//新增或修改
function save($table,$data){
    global $pdo;
    if(isset($data['id'])){
        $tmp=array2sql($data);
        $sql="updata $table set ".join(" , ",$tmp)."where id='{$data['id']}'";

        return exec($sql);
    }else{
        $keys=array_keys($data);
        $sql="insert into $table (`".join("`,`",$keys)."`) values('".join("','",$data)."');";
        return $pdo->exec($sql);
    }
}

//刪除資料
function del($table,$id){
    global $pdo;
    $sql="delete from $table where ";
    if(is_array($id)){
        $tmp=array2sql($id);
        $sql .=join(" and ",$tmp);
    }else{
        $sql .= "id='$id'";
    }
    return $pdo->exec($sql);
}

//查詢$sql的陣列
function q($sql){
    global $pdo;
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}