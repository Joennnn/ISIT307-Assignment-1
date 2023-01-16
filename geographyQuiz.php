<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Geography Quiz</title>
    </head>
    <style><?php include 'C:\wamp\www\Assignment1\menu.css'; ?></style>
    <body>
    <?php 
        # Reference quiz https://www.funtrivia.com/en/History/Singapore-18266.html
        # Questions array
        $geogQues = array(
                                "What was Singapore known as during the 14th century?",
                                "What are the colors of the Singaporean flag?",
                                "The name 'Singapore' is derived from Sanskrit. What is the meaning?",
                                "On which date did Singapore introduce a Goods and Service tax (GST) to increase the strength of its economy?",
                                "What is the name of Singapore's international airport?",
                                "What is the highest point in the island Singapore?",
                                "What is the official language of business and administration in Singapore?",
                                "Who founded the first British colony in Singapore?",
                                "What is the maximum height of skyscrapers allowed in Singapore?",
                                "What is the currency of Singapore?",
                                "What language is the medium of instruction in Singaporean schools?",
                                "NS5 is the alpha-numeric code for MRT Stations. What is the name of the MRT Station?",
                                "Who was the first elected president of Singapore?",
                                "Which university is ranked first in the whole of Singapore?",
                                "What is the largest airport in Singapore?",
                                "What is the name of the famous street that runs through Singapore's main commercial district?",
                                "A lot of Singaporeans live in a HDB flat. What does the HDB stand for?",
                                "Singapore's most popular tourist attraction is an island which is completely covered in amusement parks and museums. What is the name of this island?",
                                "What is the name of the bridge that spans across the mouth of the Singapore River?",
                                "What nickname has the city unofficially been referred to as since the 1980s?"
                            );
        # Solutions array
        $geogAns = array(
                        "Sea Town",
                        "Red and White",
                        "lion city",
                        "1 April 1994",
                        "Changi International Airport",
                        "Bukit Timah",
                        "English",
                        "Sir Thomas Stamford Raffles",
                        "280 metres",
                        "Dollar",
                        "English",
                        "Yew Tee",
                        "Ong Teng Cheong",
                        "National University of Singapore",
                        "Changi International Airport",
                        "Orchard Road",
                        "Housing and Development Board",
                        "Sentosa Island",
                        "Esplanade Bridge",
                        "The 'fine' city"
                        );
                                
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
            echo "<p><a href='quizCapitals.php'> Try again?</a></p>\n";
        }

        else {
            ?>
            <form action='quizCapitals.php' method='POST'>
            
            <p>The capital of NSW is: <input type='text' name='ans[NSW]' /></p>
            <p>The capital of Victoria is: <input type='text' name='ans[Victoria]' /></p>
            <p>The capital of West Australia is: <input type='text' name='ans[West Australia]' /></p/>
            <p>The capital of Northern Territory is: <input type='text' name='ans[Northern Territory]' /></p>
            <p>The capital of South Australia is: <input type='text' name='ans[South Australia]' /></p/>
            <p>The capital of ACT is: <input type='text' name='ans[ACT]' /></p>
            <p>The capital of Tasmania is: <input type='text' name='ans[Tasmania]' /></p>
            
            <input type='submit' name='submit' value='Check Answers' /> 
            <input type='reset' name='reset' value='Reset Form' />
            </form>
            
            <?php
        }
        ?>
    </body>
</html>