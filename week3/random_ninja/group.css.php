*
{
 margin: 0px;
 padding: 0px;
}

table 
{
    border-spacing :0px;
    border-collapse: collapse;
    margin: 0px;
    border: 1px solid black;
    
}



 .grass
{
    width: 40px;
    height: 40px;
    background-image: url(grass.png);
}

 .flower
{
    width: 40px;
    height: 40px;
    background-image: url(flowers.png);
}

.sand
{
    width: 40px;
    height: 40px;
    background-image: url(sand.png);
}

<?php 

    function ninja() {
        $random = rand(1,700);
        return $random;
    }
?>


.ninja1 {
    position: absolute;
    left: <?= ninja(); ?>px;
    top: <?= ninja(); ?>px;
    z-index: 5;
    
}
.ninja2 {
    position: absolute;
    left: <?= ninja(); ?>px;
    top: <?= ninja(); ?>px;
    z-index: 5;
    
}
.ninja3 {
    position: absolute;
    left: <?= ninja(); ?>px;
    top: <?= ninja(); ?>px;
    z-index: 5;
    
}
.ninja4 {
    position: absolute;
    left: <?= ninja(); ?>px;
    top: <?= ninja(); ?>px;
    z-index: 5;
    
}
.ninja5 {
    position: absolute;
    left: <?= ninja(); ?>px;
    top: <?= ninja(); ?>px;
    z-index: 5;
    
}