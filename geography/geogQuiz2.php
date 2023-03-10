<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Geography Quiz Question 2</title>
        <link rel="stylesheet" href='../styles/quiz.css'>
    </head>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <body>
    <?php 
        session_start();
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

        # Ensuring index of question array is not the same as previous question
        $ques1Index = $_SESSION['key1'];
        unset($geogQues[$ques1Index]);
        
        # Obtaining index of question array
        $quesIndex = $_SESSION['key2'] ?? ( $_SESSION['key2'] = array_rand($geogQues));
        # Ensuring question index is within range of question array
        if (count($geogQues) < $quesIndex) {
            $quesIndex = $_SESSION['key2'] ?? ( $_SESSION['key2'] = array_rand($geogQues));
        }

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
                        <input type="radio" name="radio" id="<?php echo($mcqChoice[$quesIndex][$x]); ?>" value="<?php echo($mcqChoice[$quesIndex][$x]); ?>" /><?php echo ($mcqChoice[$quesIndex][$x]); ?><br /><br />
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
            // Ensuring selected radio is remembered if user presses back
            $(function() {
                $('input[type=radio]').each(function() {
                    var state = JSON.parse( window.localStorage.getItem('inputRadio'  + this.id) );
                    if (state) this.checked = state.checked;
                });
            });
            $(window).bind('unload', function() {
                $('input[type=radio]').each(function() {
                    window.localStorage.setItem('inputRadio' + this.id, JSON.stringify({checked: this.checked}));
                });
            });
            
            // Stop Form Resubmission On Page Refresh
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }

            // Obtaining answer from  server side
            var ansVal = <?php echo json_encode($ansVal, JSON_HEX_TAG); ?>.trim();

            $('input[type=radio]').click(function(e) {
                // Points start from 0
                var currPoints = 0;
                var value = $(this).val();

                if (value.trim() === ansVal) {
                    currPoints = 5;
                }
                else if (value.trim() !== ansVal){
                    currPoints = -3;
                }
                // Saving current user points in session
                sessionStorage.setItem("ques2Points", currPoints);
            });
        </script>
    </body>
</html>