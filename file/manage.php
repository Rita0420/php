<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>檔案管理功能</title>
    <style>
        body{
            background-color: rgb(57, 55, 55);
            }
        header{
            text-align: center;
            color: aliceblue;
            font-size: 2em;
        }
        table{
            width: 70vw;
            margin:auto;
            text-align:center;
        }
        td{
            height: 15vh;
        }
        table,tr,td,th{
            border:2px solid aliceblue;
            border-collapse:collapse;
            color: aliceblue;
        }
        .update{
            width: 7vw;
            background-color: rgb(127, 255, 212,0.3);
            border-radius: 30px;
            border: 2px solid aliceblue;
            color:aliceblue;
        }
        .del{
            width: 7vw;
            background-color: rgb(165, 42, 42,0.3);
            border-radius: 30px;
            border: 2px solid aliceblue;
            color:aliceblue;
        }
        .home{
            width: 10vw;
            height: 5vh;
            border: 2px solid aliceblue;
            border-radius: 30px;
            margin:auto;
            text-align:center;
            padding-top: 1.5vh;
            margin-top: 2vh;
        }
        a{
            color:aliceblue;
            text-decoration: none;
        }
    </style>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>檔案管理功能</header>
    <br><br>
<?php
if (isset($_GET['msg'])) {
    echo "<h2>".$_GET['msg']."</h2>";
}
$dsn="mysql:host=localhost;dbname=files;charset=utf8";
$pdo=new PDO($dsn,'root','');
$rows=$pdo->query("select * from uploads")->fetchAll(PDO::FETCH_ASSOC);

?>

<table class="table">
    <tr>
        <th>序號</th>
        <th>縮圖</th>
        <th>檔名</th>
        <th>類型</th>
        <th>操作</th>
    </tr>
    <?php foreach($rows as $key => $row):?>
    <tr>
        <td><?=$row['id'];?></td>
        <td>
        <?php
        if($row['type']=='image'){
            echo "<img src='./files/".$row['name']."' style='width:100px;'>";
        }else{
            switch ($row['type']) {
                case 'document':
                echo "<img src='icon/document.png' style='width:100px;'>";
                break;

                case 'video':
                echo "<img src='icon/video.png' style='width:100px;'>";
                break;

                case 'music':
                echo "<img src='icon/music.png' style='width:100px;'>";
                break;
                    
                default:     
                echo "<img src='icon/others.png' style='width:100px;'>";
                break;
            }
        }
        ?>
        </td>
        <td><?=$row['name'];?></td>
        <td><?=$row['type'];?></td>
        <td>
            <br>
            <button class="update" onclick="location.href='file_update.php?id=<?=$row['id'];?>'">編輯</button>
            <br><br>
            <button class="del" data-id="<?=$row['id'];?>">刪除</button>
            <br>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="home"><a href="./index.php">回到首頁</a></div>

<script>
    $(".del").on("click",function(){
        if(confirm("確定要刪除這個檔案嗎?")){
            location.href="del_upload.php?id="+$(this).data("id");
        }
    })
</script>
    
</body>
</html>