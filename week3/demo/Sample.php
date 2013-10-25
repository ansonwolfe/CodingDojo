Sample

<?php

    $sample = array(1,3,5,7,13,21,10,5);
    $min = $sample[0];
    $max = $sample[0];

    
    
    
     for($x=0; $x<count($sample); $x++)
     {


    if($sample[$x]< $min)
        {
            $min=$sample[$x];
        }
        if($sample[$x]>$max)
        {
            $max= $sample[$x];
        }

    }
    

    $sum = 0;

    for($x=0; $x<count($sample); $x++)
    {
        $sum = ($sum + $sample[$x]);
    }

    $values = count($sample);

    $average = $sum/$values;

echo $min.'<br>';
echo $max.'<br>';
echo $values.'<br>';
echo $sum.'<br>';
echo $average;
?>