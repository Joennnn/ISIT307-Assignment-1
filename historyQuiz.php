<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>History Quiz</title>
    </head>
    <style><?php include 'C:\wamp\www\Assignment1\menu.css'; ?></style>
    <body>
        <?php 
        # Reference quiz https://www.funtrivia.com/en/History/Singapore-18266.html
        # Questions array
        $historyQues = array(
                                "What was Singapore originally known as?",
                                "What is generally regarded as the year in which Sir Thomas Stamford Raffles signed a treaty with Tengku Hussein, and founded modern Singapore?",
                                "The name Singapore was attributed to this 14th century Sumatran prince. What was his name?",
                                "Which treaty formally established the status of Singapore as a British colony?",
                                "All was not peaceful. When the 20th century came, rocky times came too. World War 1 saw the construction of the Singapore Naval Base, but who commissioned its construction?",
                                "Singapore became prominent about 1390 when this prince broke off allegeiance to the Majapahit and was granted asylum in Temasek. He murdered his chieftain host, and made himself the island's new ruler. Who was he?",
                                "Besides Singapore, which were the other two settlements that together formed the Straits Settlements?",
                                "Which European is credited with the founding of modern Singapore in 1819?",
                                "In which year did Singapore fall to the Japanese in World War Two?",
                                "The Japanese held Singapore for nearly four years, but it took the force of the Americans to change all that with two powerful forces that dropped hard. What led to the Japanese Surrender?",
                                "Singapore was incoporated with Malacca and Penang to form which territory?",
                                "What was the name that the Japanese invaders gave to Singapore after the British surrender?",
                                "In 1851, Singapore was under the control of the Governor-General of which country?",
                                "In which year did the Japanese Occupation of Singapore end?",
                                "A new leader and political force would come to power in 1959. The People's Action Party had arrived, and they were led by a young and charismatic leader who wasn't afraid to say what he had to say. Who was this great man?",
                                "Who was the first Chief Minister of Singapore?",
                                "Singapore has had the death penalty since it was a British colony and it is still enforced today. What method is used?",
                                "Which battle saw the defeat of the British forces in Malaya and the subsequent surrender of Singapore to the Japanese?",
                                "How did Singapore merge with Malaya, Sarawak and Sabah?",
                                "After many decades, Lee Kuan Yew stepped down as Prime Minister and a new man took over his post in 1990. Who took over mantle of Prime Minister?",
                                "This Conference held in London in 1957, agreed in principle that Singapore should become a state and receive full internal self-government.",
                                "What were the main acts of violence committed in Singapore prior to the Separation?",
                                "Singapore has bounced from Third World to First World in a single generation. In 2015, Singapore celebrated its 50th anniversary, but saw a tragic event in the start of the year. What happened?",
                                "The proposed formation of Malaysia was to include which countries and/or state(s)?",
                                "When did Singapore gain independence?",
                                "Who was the first president of the Republic of Singapore?",
                                "Who was Singapore's first Prime Minister?",
                                "What did Lee Kwan Yew and his administration do during his term as prime minister?"
                            );
        # Solutions array
        $historyAns = array(
                        "Temasek",
                        "1819",
                        "Sang Nila Utama",
                        "Anglo-Dutch Treaty",
                        "The British",
                        "Iskanda Shah",
                        "Malacca and Penang",
                        "Sir Stamford Raffles",
                        "1942",
                        "The atomic bombs",
                        "The Straits Settlements",
                        "Syonan-to",
                        "India",
                        "1945",
                        "Lee Kuan Yew",
                        "David Marshall",
                        "Hanging",
                        "The Battle of Singapore",
                        "By referendum with majority of votes in favour of merger",
                        "Goh Chok Tong",
                        "The Constitutional Conference",
                        "'Konfrontasi' by Indonesia and racial riots",
                        "The death of Lee Kuan Yew",
                        "All of these",
                        "August 1965",
                        "Yusof bin Ishak",
                        "Lee Kwan Yew",
                        "All of these"
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