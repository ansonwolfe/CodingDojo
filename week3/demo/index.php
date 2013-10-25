<?php
    $num_grades = 100;

    for ($i=0; $i<$num_grades; $i++)
    {    
        $score = rand(50,100);
        
            if ($score <= 70)
                echo "<h1>" . "Your Score: " . $score . "/100" . "</h1>" . "<h2>" . "Your grade is: " . "D" . "</h2>";

            elseif ($score <= 80)
                echo "<h1>" . "Your Score: " . $score . "/100" . "</h1>" . "<h2>" . "Your grade is: " . "C" . "</h2>";

            elseif ($score <= 90)
                echo "<h1>" . "Your Score: " . $score . "/100" . "</h1>" . "<h2>" . "Your grade is: " . "B" . "</h2>";

            else 
                echo "<h1>" . "Your Score: " . $score . "/100" . "</h1>" . "<h2>" . "Your grade is: " . "A" . "</h2>";
    }

?>