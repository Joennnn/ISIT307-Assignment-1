<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Singapore General Knowledge Quiz</title>
    </head>
    <style><?php include './index.css'; ?></style>
    <body>
        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nickname = $_POST['nickname'];
            echo "<h1>". $nickname ."</h1>";
        }
        { ?>
        <div class="main-container">
            <div class="intro-container">
                <div class="title">
                    <h1>Welcome to Singapore General Knowledge Quiz</h1>
                    <div class="nickname-form">
                        <form action="index.php"  method="POST">
                            <label for="nickname">Enter a nickname: </label>
                            <input type="text" id="nickname" name="nickname"><br><br>
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>    
        </div>
        <?php
        }
        ?>
    </body>
</html>