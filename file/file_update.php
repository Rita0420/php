<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>編輯資料</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>編輯資料</header>
    <?php
    include_once "db.php";
    $row=find("uploads",$_GET['id']);
    ?>
    <form action="./save_update.php" method="post" enctype="multipart/form-data">
        <?php
        switch ($row['type']) {
                case 'image':
                echo "<img src='./files/{$row['name']}' style='max-width:100px;'>";
                break;

                case 'document':
                echo "<img src='./icon/document.png' style='max-width:100px;'>";
                break;

                case 'video':
                echo "<img src='./icon/video.png' style='max-width:100px;'>";
                break;

                case 'music':
                echo "<img src='./icon/music.png' style='max-width:100px;'>";
                break;
                    
                default:     
                echo "<img src='./icon/others.png' style='max-width:100px;'>";
                break;
            }
        ?>

        <label for="name">選擇檔案上傳：</label>
        <input type="file" name="name" id="name" require>
        <br><br>
        <select name="type" id="type">
            <option value="image" <?=($row['type']=='image')?'selected':'';?>>影像</option>
            <option value="document" <?=($row['type']=='document')?'selected':'';?>>文件</option>
            <option value="video" <?=($row['type']=='video')?'selected':'';?>>影片</option>
            <option value="music" <?=($row['type']=='music')?'selected':'';?>>音樂</option>
        </select>
        <br><br>
        <textarea name="description" id="description"><?=$row['description'];?></textarea>
        <br><br>
        <input type="hidden" name="id" value="<?=$row['id'];?>">
        <button type="submit">上傳檔案</button>
        <br><br>
        <div class="home"><a href="./index.php">回到首頁</a></div>
    </form>
</body>
</html>