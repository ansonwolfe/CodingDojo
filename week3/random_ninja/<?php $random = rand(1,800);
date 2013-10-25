<html>
    <head>
        <title> videogame!</title>
        <link rel="stylesheet" type="text/css" href="group.css.php" />
    </head>
    <body>
        <div id='wrapper'>
        <?php
             function rand_field()
            {
            $field = rand(1,3);
            if ($field == 1)
            {
                return "class = 'sand'";
            }
            elseif ($field == 2)
            {
                return "class = 'flower'";
            } 
            else
            {
                return "class = 'grass'";
            }
            }

            echo '<table>';
            for($x=1; $x <21; $x++)
            {
                echo '<tr>';
                for($y=1; $y <21; $y++)
                {
                    
                        {
                            echo "<td ".rand_field()."></td>";
                        }
                }
                echo '</tr>';   
            }   
            echo '</table>';

            for ($j=1; $j<6; $j++) { 
                
                echo "<img src='down1.png' class='ninja" . $j . "'>";
            }
        ?>
        </div>

    </body>
</html>