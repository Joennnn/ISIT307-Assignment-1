<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Singapore General Knowledge Quiz</title>
        <link rel="stylesheet" href='./styles/index.css'>
    </head>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <body>
        <div class="main-container">
            <div class="options-container">
                <h1>Singapore General Knowledge Quiz</h1>
                <div class="button-container">
                    <a href="./history/histQuiz1.php">
                        <button name="history">Singapore History</button>
                    </a>
                    <a href="./geography/geogQuiz1.php">
                        <button name="geography">Singapore Geography</button>
                    </a>
                    <a href="./leaderboard.php">
                        <button name="leaderboard">Leaderboard</button>
                    </a>
                    <a href="./currPoints.php">
                        <button name="exit">Exit quiz</button>
                    </a>
                </div>
            </div>
        </div>
        <script>
            // Stop Form Resubmission On Page Refresh
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
            
            var nickname = sessionStorage.getItem("nickname");
            console.log(nickname)
        </script>
    </body>
</html>