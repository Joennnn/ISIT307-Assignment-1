<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>History Quiz</title>
    </head>
    <style><?php include './quiz.css'; ?></style>
    <body>
        <?php 
        # Reference quiz https://www.funtrivia.com/en/History/Singapore-18266.html
        # Open questions file
        $filename = "open-ended.txt";
        $fp = @fopen($filename, 'r'); 

        # Add each line to an array
        if ($fp) {
            $histQues = explode("\n", fread($fp, filesize($filename)));
        }
 
        # Open answers file
        $filename = "open-endedAns.txt";
        $fp = @fopen($filename, 'r'); 

        # Add each line to an array
        if ($fp) {
            $histAns = explode("\n", fread($fp, filesize($filename)));
        }

        # Obtaining index of question array
        $quesIndex = array_rand($histQues);
        # Obtaining answer for current question
        $ansVal = $histAns[$quesIndex];
                                
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
            echo "<p><a href='quizCapitals.php'> Try again?</a></p>\n";
        }

        else {
            ?>
            <h1>Question 3</h1>
            <div class='form-container'>
                <form action='histQuiz3.php' method='POST'>
                    <?php echo '<p>'; echo($histQues[$quesIndex]); echo '</p>'; ?><br />
                    <label>
                        <input type="radio" name="radio" value="English">English
                    </label> <br /><br />

                    <label>
                        <input type="radio" name="radio" value="Chinese">Chinese
                    </label> <br /><br />

                    <label>
                        <input type="radio" name="radio" value="Malay">Malay
                    </label> <br /><br />

                    <label>
                        <input type="radio" name="radio" value="Tamil">Tamil
                    </label> <br /><br />

                    <div class="quesButton">
                        <input type='submit' name='submit' value='Previous' />
                        <input type='submit' name='submit' value='Next' />
                    </div>
                </form>
            </div>
            
            <?php
        }
        ?>
    </body>
</html>