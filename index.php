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
            <div class="options-container">
                <h1>Singapore General Knowledge Quiz</h1>
                <a href="./history/histQuiz1.php">
                    <button>Singapore History</button>
                </a>
                
                <a href="./geography/geogQuiz1.php">
                    <button>Singapore Geography</button>
                </a>
                
                <a href="./leaderboard.php">
                    <button>Leaderboard</button>
                </a>
                
                <a href="./welcome.php">
                    <button>Exit quiz</button>
                </a>
            </div>
        </div>
        <?php
        }
        ?>
    </body>
</html>