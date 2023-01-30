<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Geography Quiz Results</title>
    </head>
    <style><?php include '../styles/quiz.css'; ?></style>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <body>
        <?php 
            # Open points file
            $filename = "../points/totalPoints.txt";
            $fp = @fopen($filename, 'r');
            $userArr = array();

            # Add each line to an array
            if ($fp) {
                $userPoints = explode("\n", fread($fp, filesize($filename)));
            }

            # Adding item to array
            foreach ($userPoints as $item){
                $userArr[] = explode(", ", $item);
            }
        ?>
        <div class="main-container">
            <div class="points-container">
                <h2>Current Points</h2>
                <h1 class="currentPoint"></h1>

                <h2>Overall points</h2>
                <h1 class="overallPoint"></h1>
            </div>
            <div class="options-container">
                <a href="./geogQuiz1.php">
                    <button>Restart Quiz</button>
                </a>

                <a href="../history/histQuiz1.php">
                    <button>History Quiz</button>
                </a>
                
                <a href="../leaderboard.php">
                    <button>Leaderboard</button>
                </a>
                
                <a href="../index.php">
                    <button>Exit quiz</button>
                </a>
            </div>
        </div>
        <script>
            // Obtaining nickname from previous page
            var nickname = sessionStorage.getItem("nickname");
            // Obtaining currPoints from previous page
            var currPoints = parseInt(sessionStorage.getItem("currPoints"));
            // Obtaining array from PHP
            var userArr = <?php echo json_encode($userArr); ?>;

            console.log(userArr);

            // Displays current points from quiz
            let current = document.getElementsByClassName("currentPoint");
            current[0].innerHTML = currPoints;

            let overall = document.getElementsByClassName("overallPoint");

            // Checking if current user has score within points file
            for (let i = 0; i < userArr.length; i++) {
                if (nickname === userArr[i][0]){
                    // Displays overall points after current quiz
                    let totalPoints = parseInt(userArr[i][1]) + currPoints;
                    overall[0].innerHTML = totalPoints;

                    // Update array with updated points
                    userArr[i][1] = totalPoints;
                    break;
                }
                else {
                    // Displays points for new user
                    overall[0].innerHTML = currPoints;
                }
            }
        </script>
    </body>
</html>