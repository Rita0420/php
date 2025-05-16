<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI計算器</title>
    <style>
        *{
            box-sizing: border-box;
            margin: 0;
        }
        .bmi{
            width: 50%;
            height:40vh;
            background-color:antiquewhite;
            margin: auto;
            text-align:center;
            padding-top: 150px;
            margin-top: 250px;
            border: 5px solid black;
        }

    </style>
</head>
<body>
    <div class="bmi">
    <form action="bmi.php" method='get'>
        <div>
            <label for="height">身高(公尺):</label>
            <input type="number" step="0.01"  min="0" name="height">
        </div>
        <div>
            <label for="weight">體重(公斤):</label>
            <input type="number" name="weight" min="0">
        </div>
        <input type="submit" name="計算BMI">
        <input type="reset" value="清空內容">
    </div>
</form>
</body>
</html>