<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Quiz - Capitals</title>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        <?php 
        $StateCapitals = array(
                                "NSW" => "Sydney",
                                "Victoria" => "Melbourne",
                                "West Australia" => "Perth",
                                "Northern Territory" => "Darwin",
                                "South Australia" => "Adelaide",
                                "ACT" => "Canberra",
                                "Tasmania" => "Hobart");
                                
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
            /*
            echo "<form action='quizCapitals.php' method='POST'>\n";
            
            foreach ($StateCapitals as $State => $Response)
                echo "The capital of $State is: <input type='text' name='ans[" . $State . "]' /><br /><br />\n";
            
            echo "<input type='submit' name='submit' value='Check Answers' /> ";
            echo "<input type='reset' name='reset' value='Reset Form' />\n";
            echo "</form>\n";
            */
        }
        ?>
    </body>
</html>
