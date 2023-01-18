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
        $filename = "question.txt";
        $fp = @fopen($filename, 'r'); 

        # Add each line to an array
        if ($fp) {
            $geogQues = explode("\n", fread($fp, filesize($filename)));
        }
 
        # Open answers file
        $filename = "answer.txt";
        $fp = @fopen($filename, 'r'); 

        # Add each line to an array
        if ($fp) {
            $geogAns = explode("\n", fread($fp, filesize($filename)));
        }

        $quesIndex = array_rand($geogQues);
        
        $ansVal = $geogAns[$quesIndex];
        echo ($ansVal);

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
            <div class='form-container'>
                <form action='geogQuiz5.php' method='POST'>
                    <?php echo '<p>'; echo($geogQues[$quesIndex]); echo '</p>'; ?>
                    <input type='text' placeholder="Enter your answer" />
                    
                    <br /> <br />

                    <div class="quesButton">
                        <input type='submit' name='submit' value='Previous' />
                        <input type='submit' name='submit' value='Submit' />
                    </div>
                </form>
            </div>
            <?php
        }
        ?>
    </body>
</html>