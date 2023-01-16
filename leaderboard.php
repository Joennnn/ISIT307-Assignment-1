<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Singapore General Knowledge Quiz</title>
    </head>
    <style><?php include 'C:\wamp\www\Assignment1\leaderboard.css'; ?></style>
    <body>
        <?php 
        { ?>
        <div class="leaderboard-container">
            <div class="leaderboard">
                <div class="rank">
                    <div class="filter-button"> 
                        <button>
                            <img src="./images/badge.png" alt="Points"/>
                        </button>
                        <button>
                            <img src="./images/sort-az.png" alt="Alphabetical"/>
                        </button>
                    </div>
                    <div class="own-rank">
                        <div class="own-name">
                            <h3>NICKNAME</h3>
                            <h2>NAME</h2>
                        </div>
                        <div class="own-score">
                            <h3>SCORE</h3>
                            <h2>10</h2>
                        </div>
                    </div>
                    <div class="rankings">
                        <ul>
                            <li class="rankNum">Rank</li>
                            <li class="rankName">Names</li>
                            <li class="rankPoints">Points</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
            
        <?php
        }
        ?>
    </body>
</html>