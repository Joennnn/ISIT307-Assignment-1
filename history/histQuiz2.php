<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>History Quiz Question 2</title>
        <link rel="stylesheet" href='../styles/quiz.css'>
    </head>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
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
            $mcqChoice[] = explode(", ", $item);
        }

        # Obtaining index of question array
        $quesIndex = array_rand($histQues);
        # Obtaining answer for current question
        $ansVal = $mcqChoice[$quesIndex][0]; 
        ?>
        <div class="main-container">
            <h1>Question 2</h1>
            <div class='form-container'>
            <form action='histQuiz3.php' method='POST'>
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
                        <button type="button" onclick="location.href = 'histQuiz1.php'">Previous</button></br></br>
                        <button type="button" onclick="location.href = 'histQuiz3.php'">Next</button></br></br>
                    </div>
                </form>
            </div>
        </div>

        <script>
            // Stop Form Resubmission On Page Refresh
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
            // Obtaining currPoints from previous page
            var currPoints = parseInt(sessionStorage.getItem("currPoints"));
            var ansVal = <?php echo json_encode($ansVal, JSON_HEX_TAG); ?>.trim();
            console.log(ansVal);

            $('input[type=radio]').click(function(e) {
                var value = $(this).val();

                if (value.trim() === ansVal) {
                    currPoints = currPoints + (1 * 5);
                }
                else if (value.trim() !== ansVal){
                    currPoints = currPoints - (1 * 3);
                }
                // Saving current user points in session
                sessionStorage.setItem("currPoints", currPoints);
            });
        </script>
    </body>
</html>