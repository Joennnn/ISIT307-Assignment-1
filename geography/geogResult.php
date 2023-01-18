<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Geography Quiz</title>
    </head>
    <style><?php include './quiz.css'; ?></style>
    <body>
    <?php 
        # Obtain username of user
        $userName = "";
        # Calculating quiz score
        #$quizRes = (($numCorrect * 5) - ($numWrong * 3));

        # Saving points to an array
        $resArr = array();
        $filename = fopen("../points/totalPoints.txt", "r");
        if ($filename) {
            $i = 0;
            while (($line = fgets($filename)) !== false) {
                $data = explode(",", $line);
                $resArr[$i] = array(
                    0 => $data[0],
                    1 => $data[1],
                    2 => $data[2]
                );
                $i++;
            }
            fclose($filename);
        }

        $keys = array_keys($resArr);
        for($i = 0; $i < count($resArr); $i++) {
            echo $keys[$i] . "{<br>";
            foreach($resArr[$keys[$i]] as $key => $value) {
                echo $key . " : " . $value . "<br>";
            }
            echo "}<br>";
        }

        if (isset($_POST['submit'])) {
            $Answers = $_POST['ans'];
            if (is_array($Answers)) {
                foreach ($Answers as $State => $Response) {
                    $Response = stripslashes($Response);
                    if (strlen($Response)>0) {
                        if (strcasecmp($StateCapitals["$State"],$Response)==0)
                            echo "<p>Correct! The capital of $State is " . $StateCapitals[$State] . ".</p>\n";
                        else
                            echo "<p>Sorry, the capital of $State is not '" . $Response . "'.</p>\n";
                    }
                    else
                        echo "<p>You did not enter a value for the capital of $State.</p>\n";
                } 
            }
        }

        else {
            ?>
            <div class="main-container">
                <div class="points-container">
                    <h2>Current Points</h2>
                    <h3>10</h3>

                    <h2>Overall points</h2>
                    <h3>25</h3>
                </div>
                <div class="options-container">
                    <a href="./geography/geogQuiz1.php">
                        <button>Restart Quiz</button>
                    </a>

                    <a href="./history/histQuiz1.php">
                        <button>History Quiz</button>
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