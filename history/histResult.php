<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>History Quiz Results</title>
        <link rel="stylesheet" href='../styles/quiz.css'>
    </head>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <body>
        <?php
            session_start();
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
                <a href="./histQuiz1.php">
                    <button>Restart Quiz</button>
                </a>

                <a href="../geography/geogQuiz1.php">
                    <button>Geography Quiz</button>
                </a>
                
                <a href="../leaderboard.php">
                    <button>Leaderboard</button>
                </a>
                
                <a href="../currPoints.php">
                    <button>Exit quiz</button>
                </a>
            </div>
        </div>
        <script>
            // Stop Form Resubmission On Page Refresh
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }

            // Creating cookie
            function createCookie(name, value, days) {
                var expires;
                
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toGMTString();
                }
                else {
                    expires = "";
                }
                
                document.cookie = escape(name) + "=" + 
                    escape(value) + expires + "; path=/";
            }; 

            // Obtaining nickname from previous page
            var nickname = sessionStorage.getItem("nickname");
            var newPlayer = false;

            // Obtaining points from questions
            var ques1Points = parseInt(sessionStorage.getItem("ques1Points"));
            var ques2Points = parseInt(sessionStorage.getItem("ques2Points"));
            var ques3Points = parseInt(sessionStorage.getItem("ques3Points"));
            var currPoints = parseInt(sessionStorage.getItem("currPoints"));

            // Adding all points together
            var totalPoints = (currPoints + ques1Points + ques2Points + ques3Points);

            // Obtaining array from PHP
            var userArr = <?php echo json_encode($userArr); ?>;

            // Displays current points from quiz
            let current = document.getElementsByClassName("currentPoint");
            let overall = document.getElementsByClassName("overallPoint");
            current[0].innerHTML = totalPoints;

            // Checking if current user has score within points file
            for (let i = 0; i < userArr.length; i++) {
                if (nickname === userArr[i][0]){
                    // Displays overall points after current quiz
                    overall[0].innerHTML = parseInt(userArr[i][1]) + totalPoints;

                    // Update array with updated points
                    userArr[i][1] = parseInt(userArr[i][1]) + totalPoints;
                    break;
                }
                else {
                    newPlayer = true;
                }
            }

            // If user is a new player
            if (newPlayer) {
                // Displays points for new user
                overall[0].innerHTML = totalPoints;
                
                // Save new user details to userArr
                userArr.push([nickname, totalPoints]);
            }
            
            // Creating cookie after update of userArr
            $(document).ready(function () {
                createCookie("userPointsArr", userArr, "1");
            });

            window.localStorage.clear();
        </script>
        <?php
            // Getting array by using cookie
            $txt = $_COOKIE["userPointsArr"];

            // Converting string to array
            $txtArr = array_map(
                function($value) {
                    return implode(', ', $value);
                },
                array_chunk(
                    explode(',', $txt), 2
                )
            );
            // Saving updated array to text file
            file_put_contents('../points/totalPoints.txt', implode("\n", $txtArr));

            // Resetting the session
            unset($_SESSION['key1']);
            unset($_SESSION['key2']);
            unset($_SESSION['key3']);
            unset($_SESSION['key4']);
            unset($_SESSION['key5']);
        ?>;
    </body>
</html>