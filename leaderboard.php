<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Singapore General Knowledge Quiz</title>
        <link rel="stylesheet" href='./styles/leaderboard.css'>
    </head>
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
        <div class="leaderboard-container">
            <div class="leaderboard">
                <div class="rank">
                    <div>
                        <a href="./home.php">
                            <button class="back-button">Back</button>
                        </a>
                    </div>
                    <div class="filter-button"> 
                        <button name="points" onclick="sortPoints()">
                            <img src="./images/badge.png" alt="Points"/>
                        </button>
                        <button name="alpha" onclick="sortAlpha()">
                            <img src="./images/sort-az.png" alt="Alphabetical"/>
                        </button>
                    </div>
                    <div class="rankings">
                        <table class="pointsTable">
                            <tr>
                                <th>Name</th>
                                <th>Overall Points</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Stop Form Resubmission On Page Refresh
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }

            // Obtaining nickname from previous page
            var nickname = sessionStorage.getItem("nickname");
            // Obtaining array from PHP            
            var userArr = <?php echo json_encode($userArr); ?>;

            let name = document.getElementsByClassName("name");
            let points = document.getElementsByClassName("overallPoint");
            let table = document.getElementsByClassName("pointsTable");

            for (let i = 0; i < userArr.length; i++) {
                const row = document.createElement("tr");

                for (let j = 0; j < 2; j++) {
                    const cell = document.createElement("td");
                    const cellText = document.createTextNode(userArr[i][j]);
                    cell.appendChild(cellText);
                    row.appendChild(cell);
                }
                table[0].appendChild(row);
            }

            // Function to sort alphabatically
            function sortAlpha() {
                var rows, switching, i, x, y, shouldSwitch;
                switching = true;
                // While loop to ensure loop is done
                while (switching) {
                    // Set switch as false
                    switching = false;
                    rows = table[0].rows;
                    
                    // Loops from first row and not header
                    for (i = 1; i < (rows.length - 1); i++) {
                        // Set switch as false
                        shouldSwitch = false;
                        // Getting current row and next row
                        x = rows[i].getElementsByTagName("td")[0];
                        y = rows[i + 1].getElementsByTagName("td")[0];
                        
                        // Check if both rows need to be switched
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            // Row need to switch, break loop
                            shouldSwitch = true;
                            break;
                        }
                    }
                    // Checking if row should be switched
                    if (shouldSwitch) {
                        // Switch row and mark true
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                    }
                }
            }

            // Function to sort points in ascending order
            function sortPoints() {
                var rows, switching, i, x, y, shouldSwitch;
                switching = true;
                // While loop to ensure loop is done
                while (switching) {
                    // Set switch as false
                    switching = false;
                    rows = table[0].rows;
                    
                    // Loops from first row and not header
                    for (i = 1; i < (rows.length - 1); i++) {
                        // Set switch as false
                        shouldSwitch = false;
                        // Getting current row and next row
                        x = rows[i].getElementsByTagName("td")[1];
                        y = rows[i + 1].getElementsByTagName("td")[1];
                        
                        // Check if both rows need to be switched
                        if (Number(x.innerHTML) < Number(y.innerHTML)) {
                            // Row need to switch, break loop
                            shouldSwitch = true;
                            break;
                        }
                    }
                    // Checking if row should be switched
                    if (shouldSwitch) {
                        // Switch row and mark true
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                    }
                }
            }
        </script>
    </body>
</html>