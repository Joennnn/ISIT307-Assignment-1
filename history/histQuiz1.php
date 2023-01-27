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
        $filename = "mcqQues.txt";
        $fp = @fopen($filename, 'r');

        # Add each line to an array
        if ($fp) {
            $histQues = explode("\n", fread($fp, filesize($filename)));
        }
 
        # Open answers file
        $filename = "mcqChoice.txt";
        $fp = @fopen($filename, 'r'); 
        $mcqChoice = array();

        # Add each line to an array
        if ($fp) {
            $histChoice = explode("\n", fread($fp, filesize($filename)));
        }
        
        # Adding item to array
        foreach ($histChoice as $item){
            $mcqChoice[] = explode(",", $item);
        }

        # Obtaining index of question array
        $quesIndex = array_rand($histQues);
        # Obtaining answer for current question
        $ansVal = $mcqChoice[$quesIndex][0];
                                
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
            echo "<p><a href='quizCapitals.php'> Try again?</a></p>\n";
        }

        else {
            ?>
            <div class="main-container">
                <a href="../index.php">
                    <button>Back</button>
                </a>
                <h1>Quiz on Singapore History</h1>
                <h1>Question 1</h1>
                <div class='form-container'>
                    <form action='histQuiz1.php' method='POST'>
                        <?php echo '<p>'; echo($histQues[$quesIndex]); echo '</p>'; ?> <br />

                        <?php 
                            # Loops through the 4 mcq choices
                            for ($x = 1; $x <= 4; $x++) {
                        ?>
                            <input type="radio" name="radio" value="<?php echo($mcqChoice[$quesIndex][$x]); ?>" /><?php echo ($mcqChoice[$quesIndex][$x]); ?><br /><br />
                        <?php
                        }
                        ?>

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