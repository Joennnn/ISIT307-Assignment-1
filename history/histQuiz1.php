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
        $filename = "question.txt";
        $fp = @fopen($filename, 'r'); 

        # Add each line to an array
        if ($fp) {
            $histQues = explode("\n", fread($fp, filesize($filename)));
        }
        @fclose($filename);
 
        # Open answers file
        $filename = "answer.txt";
        $fp = @fopen($filename, 'r'); 

        # Add each line to an array
        if ($fp) {
            $histAns = explode("\n", fread($fp, filesize($filename)));
        }
        @fclose($filename);

        # Obtaining index of question array
        $quesIndex = array_rand($histQues);
        # Obtaining answer for current question
        $ansVal = $histAns[$quesIndex];
        #echo ($ansVal);
                                
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
            <div class="main-container">
                <a href="../index.php">
                    <button>Back</button>
                </a>
                <h1>Quiz on Singapore History</h1>
                <div class='form-container'>
                    <form action='histQuiz1.php' method='POST'>
                        <?php echo '<p>'; echo($histQues[$quesIndex]); echo '</p>'; ?>
                        <input type='text' placeholder="Enter your answer" />

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