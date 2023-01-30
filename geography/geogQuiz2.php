<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Geography Quiz Question 2</title>
    </head>
    <style><?php include '../styles/quiz.css'; ?></style>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <body>
    <?php 
        # Reference quiz https://www.funtrivia.com/en/Geography/Singapore-12873.html
        # Open questions file
        $filename = "mcqQues.txt";
        $fp = @fopen($filename, 'r');

        # Add each line to an array
        if ($fp) {
            $geogQues = explode("\n", fread($fp, filesize($filename)));
        }
 
        # Open answers file
        $filename = "mcqChoice.txt";
        $fp = @fopen($filename, 'r'); 
        $mcqChoice = array();

        # Add each line to an array
        if ($fp) {
            $geogChoice = explode("\n", fread($fp, filesize($filename)));
        }
        
        # Adding item to array
        foreach ($geogChoice as $item){
            $mcqChoice[] = explode(",", $item);
        }

        # Obtaining index of question array
        $quesIndex = array_rand($geogQues);
        # Obtaining answer for current question
        $ansVal = $mcqChoice[$quesIndex][0];
        ?>
        <div class="main-container">
            <h1>Question 2</h1>
            <div class='form-container'>
                <form action='geogQuiz3.php' method='POST'>
                    <?php echo '<p>'; echo($geogQues[$quesIndex]); echo '</p>'; ?> <br />

                    <?php 
                        # Loops through the 4 mcq choices
                        for ($x = 1; $x <= 4; $x++) {
                    ?>
                        <input type="radio" name="radio" value="<?php echo($mcqChoice[$quesIndex][$x]); ?>" /><?php echo ($mcqChoice[$quesIndex][$x]); ?><br /><br />
                    <?php
                    }
                    ?>

                    <div class="quesButton">
                        <button type="button" onclick="location.href = 'geogQuiz1.php'">Previous</button></br></br>
                        <button type="button" onclick="location.href = 'geogQuiz3.php'">Next</button></br></br>
                    </div>
                </form>
            </div>
        </div>
        <script>
            // Obtaining currPoints from previous page
            var currPoints = parseInt(sessionStorage.getItem("currPoints"));
            var ansVal = <?php echo json_encode($ansVal, JSON_HEX_TAG); ?>.trim();         

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