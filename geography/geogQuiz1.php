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
        # Reference quiz https://www.funtrivia.com/en/History/Singapore-18266.html
        # Open questions file
        $filename = "multiplechoice.txt";
        $fp = @fopen($filename, 'r'); 

        # Add each line to an array
        if ($fp) {
            $geogQues = explode("\n", fread($fp, filesize($filename)));
        }
 
        # Open answers file
        $filename = "multiplechoiceAns.txt";
        $fp = @fopen($filename, 'r'); 

        # Add each line to an array
        if ($fp) {
            $geogAns = explode("\n", fread($fp, filesize($filename)));
        }

        # Obtaining index of question array
        $quesIndex = array_rand($geogQues);
        # Obtaining answer for current question
        $ansVal = $geogAns[$quesIndex];

        if (isset($_POST['submit'])) {
            # Variables to save correct and incorrect answers
            $countCorrect = 0;
            $countWrong = 0;

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
                <a href="../index.php">
                    <button>Back</button>
                </a>
                <h1>Quiz on Singapore Geography</h1>
                <div class='form-container'>
                    <form action='geogQuiz1.php' method='POST'>
                        <?php echo '<p>'; echo($geogQues[$quesIndex]); echo '</p>'; ?>
                        <label>
                            <input type="radio" name="radio" value="English">English
                        </label>

                        <label>
                            <input type="radio" name="radio" value="Chinese">Chinese
                        </label>

                        <label>
                            <input type="radio" name="radio" value="Malay">Malay
                        </label>

                        <label>
                            <input type="radio" name="radio" value="Tamil">Tamil
                        </label>

                        <br /> <br />

                        <div class="quesButton">
                            <input type='submit' name='submit' value='Next' />
                        </div>
                    </form>
                </div>
            </div>
            <?php
        }
        ?>
    </body>
</html>