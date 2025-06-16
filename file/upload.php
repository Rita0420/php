<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>檔案上傳</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>檔案上傳練習</header>
    <form action="./uploaded_file.php" method="post" enctype="multipart/form-data">
        <label for="name">選擇檔案上傳：</label>
        <input type="file" name="name" id="name" require>
        <br><br>
        <select name="type" id="type">
            <option value="image">影像</option>
            <option value="document">文件</option>
            <option value="video">影片</option>
            <option value="music">音樂</option>
        </select>
        <br><br>
        <textarea name="description" id="description"></textarea>
        <br><br>
        <button type="submit">上傳檔案</button>
    </form>
    <br><br>
    <div class="home"><a href="./index.php">回到首頁</a></div>
</body>
</html>