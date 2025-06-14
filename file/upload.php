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
        <label for="file">選擇檔案上傳：</label>
        <input type="file" name="myfile" id="file" require>
        <button type="submit">上傳檔案</button>
    </form>
</body>
</html>