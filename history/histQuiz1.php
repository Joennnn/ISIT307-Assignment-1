<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>History Quiz Question 1</title>
        <link rel="stylesheet" href='../styles/quiz.css'>
    </head>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <body>
        <?php 
        session_start();
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
        $quesIndex = $_SESSION['key1'] ?? ( $_SESSION['key1'] = array_rand($histQues));
        # Obtaining answer for current question
        $ansVal = $mcqChoice[$quesIndex][0];

        ?>
        <div class="main-container">
            <a href="../home.php">
                <button>Back</button>
            </a>
            <h1>Quiz on Singapore History</h1>
            <h1>Question 1</h1>
            <div class='form-container'>
                <form action='histQuiz2.php' method='POST'>
                    <?php echo '<p>'; echo($histQues[$quesIndex]); echo '</p>'; ?> <br />
                    <?php 
                        # Loops through the 4 mcq choices
                        for ($x = 1; $x <= 4; $x++) {
                    ?>
                        <input type="radio" name="radio" id="<?php echo($mcqChoice[$quesIndex][$x]); ?>" value="<?php echo($mcqChoice[$quesIndex][$x]); ?>" /><?php echo ($mcqChoice[$quesIndex][$x]); ?><br /><br />
                    <?php
                    }
                    ?>
                    <div class="quesButton">
                        <input type='submit' name='next' value='Next' />
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
            
            // Obtaining answer string from server side
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
                sessionStorage.setItem("ques1Points", currPoints);
            });
        </script>
    </body>
</html>