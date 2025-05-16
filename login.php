<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
        }

        .member {
            width: 40%;
            height: 15vh;
            background-color: beige;
            text-align: center;
            margin: auto;
            margin-top: 42.5%;
            border: 3px solid black;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <h2>會員登入</h2>
        </div>
        <div class="member">
            <form action="check.php" method='post'>
                <div>
                    <label for="acc">帳號:</label>
                    <input type="text" name="acc" required>
                </div>
                <div>
                    <label for="pw">密碼:</label>
                    <input type="text" name="pw">
                </div>
                <br>
                <br>
                <input type="submit" name="登入">
                <input type="reset" value="清空內容">
            </form>
        </div>
    </div>
</body>

</html>