<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Singapore General Knowledge Quiz</title>
    </head>
    <style><?php include 'C:\wamp\www\Assignment1\index.css'; ?></style>
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
                    <h1>Singapore General Knowledge Quiz</h1>
                </div>
                <div class="nickname-form">
                    <form action="index.php"  method="POST">
                        <label for="nickname">Enter a nickname: </label>
                        <input type="text" id="nickname" name="nickname"><br><br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
            <div class="options-container">
                <a href="./historyQuiz.php">
                    <button>Singapore History</button>
                </a>
                
                <a href="./geographyQuiz.php">
                    <button>Singapore Geography</button>
                </a>
                
                <a href="./leaderboard.php">
                    <button>Leaderboard</button>
                </a>
                
                <a href="./index.php">
                    <button>Exit quiz</button>
                </a>
            </div>
        </div>
        <?php
        }
        ?>
    </body>
</html>