<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Singapore General Knowledge Quiz</title>
    </head>
    <style><?php include './styles/index.css'; ?></style>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <body>
        <?php 
            # Open points file
            $filename = "./points/totalPoints.txt";
            $fp = @fopen($filename, 'r');
            $userArr = array();

            # Add each line to an array
            if ($fp) {
                $userPoints = explode("\n", fread($fp, filesize($filename)));
            }

            # Adding item to array
            foreach ($userPoints as $item){
                $userArr[] = explode(", ", $item);
            }
        ?>
        <div class="main-container">
            <div class="intro-container">
                <div class="title">
                    <h1>Hope to see you again!</h1>
                    <table>
                        <tr>
                            <th>Nickname</th>
                            <th>Overall Points</th>
                        </tr>
                        <tr>
                            <td class="name"></td>
                            <td class="overallPoint"></td>
                        </tr>
                    </table>
                </div>
                <div class="exit-button">
                    <a href="./index.php">
                        <button>New Attempt</button>
                    </a>
                </div>
            </div>    
        </div>
        <script>
            // Obtaining nickname from previous page
            var nickname = sessionStorage.getItem("nickname");
            // Obtaining array from PHP            
            var userArr = <?php echo json_encode($userArr); ?>;

            let name = document.getElementsByClassName("name");
            let points = document.getElementsByClassName("overallPoint");

            // Checking if current user has score within points file
            for (let i = 0; i < userArr.length; i++) {
                if (nickname === userArr[i][0]){
                    name[0].innerHTML = userArr[i][0];
                    points[0].innerHTML = userArr[i][1];
                    break;
                }
                // If nickname not found, user will be directed to welcome page
                else {
                    location.href = "./index.php";
                }
            }
        </script>
    </body>
</html>