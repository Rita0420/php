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
    <header>檔案上傳</header>
    <br><br>
    <form action="./upload_file.php" method="post" enctype="multipart/form-data">
        <label for="name" class="file">選擇檔案</label>
        <input type="file" name="name" id="name" hidden>
        <br><br>
        <label for="type">選擇類型</label>
        <select name="type" id="type">
            <option value="image">影像</option>
            <option value="document">文件</option>
            <option value="video">影片</option>
            <option value="music">音樂</option>
        </select>

        <textarea name="description" id="description"></textarea>

        <button type="submit">上傳</button>

    </form>
</body>
</html>