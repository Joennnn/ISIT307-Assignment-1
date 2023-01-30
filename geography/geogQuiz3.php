<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Geography Quiz Question 3</title>
    </head>
    <style><?php include '../styles/quiz.css'; ?></style>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <body>
    <?php 
        # Reference quiz https://www.funtrivia.com/en/History/Singapore-18266.html
        # Open questions file
        $filename = "open-ended.txt";
        $fp = @fopen($filename, 'r'); 

        # Add each line to an array
        if ($fp) {
            $geogQues = explode("\n", fread($fp, filesize($filename)));
        }
 
        # Open answers file
        $filename = "open-endedAns.txt";
        $fp = @fopen($filename, 'r');

        # Add each line to an array
        if ($fp) {
            $geogAns = explode("\n", fread($fp, filesize($filename)));
        }

        # Obtaining index of question array
        $quesIndex = array_rand($geogQues);
        # Obtaining answer for current question
        $ansVal = $geogAns[$quesIndex];
        
        ?>
        <div class="main-container">
            <h1>Question 3</h1>
            <div class='form-container'>
                <form action='geogQuiz4.php' method='POST'>
                    <?php echo '<p>'; echo($geogQues[$quesIndex]); echo '</p>'; ?>
                    <input type='text' name="ansText" placeholder="Enter your answer" />
                    
                    <br /> <br />

                    <div class="quesButton">
                        <button type="button" onclick="location.href = 'geogQuiz2.php'">Previous</button></br></br>
                        <button type="button" onclick="location.href = 'geogQuiz4.php'">Next</button></br></br>
                    </div>
                </form>
            </div>
        </div>
        <script>
            // Obtaining currPoints from previous page
            var currPoints = parseInt(sessionStorage.getItem("currPoints"));
            var ansVal = <?php echo json_encode($ansVal, JSON_HEX_TAG); ?>; 

            // Setting time out variable
            var type_timer;
            var finished_writing_interval = 500;
            var inputText = document.getElementsByName("ansText")[0];

            // Start timeout when user start typing
            inputText.addEventListener('keyup', function () {
                clearTimeout(type_timer);
                type_timer = setTimeout(finished_typing, finished_writing_interval);
            });

            // Clear timeout on key down event
            inputText.addEventListener('keydown', function () {
                clearTimeout(type_timer);
            });

            // When user finish typing, user input will be checked against answer
            function finished_typing () {
                var finalText = document.getElementsByName("ansText")[0].value;

                if (finalText.trim().toLowerCase() === ansVal.trim().toLowerCase()) {
                    currPoints = currPoints + (1 * 5);
                    console.log(currPoints);
                }
                else if (finalText.trim().toLowerCase() === ansVal.trim().toLowerCase()){
                    currPoints = currPoints - (1 * 3);
                    console.log(currPoints);
                }
                // Saving current user points in session
                sessionStorage.setItem("currPoints", currPoints);
            }
        </script>
    </body>
</html>