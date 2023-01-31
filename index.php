<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Singapore General Knowledge Quiz</title>
        <link rel="stylesheet" href='./styles/index.css'>
    </head>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <?php 
        // Checks if input value is not empty
        if (isset($_POST['submit'])) {
            if (isset( $_POST['nickname'] ) &&  strlen( $_POST['nickname'] )) {
                header("Location: ./home.php");
            }
            else { 
    ?>
            <script>
                alert("Please enter a nickname");
            </script>
    <?php 
        }
    };
    ?>
    <body>
        <div class="main-container">
            <div class="intro-container">
                <div class="title">
                    <h1>Welcome to Singapore General Knowledge Quiz</h1>
                    <div class="nickname-form">
                        <form action="index.php"  method="POST">
                            <label for="nickname">Enter a nickname: </label>
                            <input type="text" name="nickname"><br><br>
                            <input type="submit" name="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>    
        </div>
    <script>
        // Stop Form Resubmission On Page Refresh
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }

        // Setting time out variable
        var type_timer;
        var finished_writing_interval = 500;
        var inputText = document.getElementsByName("nickname")[0];

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
        function finished_typing() {
            var nickname = document.getElementsByName("nickname")[0].value;
            // Saving nickname in session
            sessionStorage.setItem("nickname", nickname);
        }
    </script>
    </body>
</html>