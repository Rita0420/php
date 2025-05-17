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

        body{
            background-color: rgb(28, 27, 27);
        }

        .container {
            height: 50vh;
            background-color: rgba(166, 161, 161, 0.092);
            max-width: 90vh;
            margin: auto;
            text-align: center;
            margin-top: 30vh;
            padding: 4vh;
            border-radius: 50px;
        }

        .member {
            max-width: 60vh;
            height: 30vh;
            background-color: rgb(32, 31, 31);
            border: 0.5vh solid white;
            margin: auto;
            padding: 5vh;
        }

        h2 {
            font-size: calc(1rem + 1vw);
            color: white;
        }

        input,label,button {
            display: inline;
            font-size: calc(0.1rem + 1vw);
            border-color: white;          
        }
        label,.button{
            color:white;
        }

        .button{
            background-color: black;
            border-radius: 50px;
        }
    </style>
</head>

<body>
    <?php
    if (!isset($_POST['login'])) {
    ?>

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
                    <input type="submit" name="登入" class="button">
                    <input type="reset" value="清空內容" class="button">
                </form>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>