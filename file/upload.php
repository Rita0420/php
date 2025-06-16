<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>檔案上傳</title>
    <style>
        body {
    background-color: rgb(57, 55, 55);
}

a {
    text-decoration: none;
    color: aliceblue;
    text-shadow: 2px 2px 2px black;
}

.types {
    width: 20vw;
    height: 7vh;
    background-color: rgb(127, 255, 212, 0.3);
    margin: auto;
    margin-top: 2vh;
    text-align: center;
    padding-top: 3vh;
    border-radius: 30px;
    box-shadow: 2px 2px 5px white;
    font-size: 1.5em;
}

.types:hover {
    background-color: rgb(127, 255, 212, 0.8);
    border: 4px solid aliceblue;
}

header {
    text-align: center;
    color: aliceblue;
    font-size: 2em;
}

form {
    text-align: center;
    margin-top: 5vh;
    color: aliceblue;
}

.home {
    width: 10vw;
    height: 5vh;
    border: 2px solid aliceblue;
    border-radius: 30px;
    margin: auto;
    text-align: center;
    padding-top: 1.5vh;
    margin-top: 2vh;
}

a {
    color: aliceblue;
    text-decoration: none;
}
    </style>
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