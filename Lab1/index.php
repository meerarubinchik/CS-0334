<!DOCTYPE html>
<html lang="EN" dir="ltr" xmlns="http://w3.org/1999/xhtml">
<!--Meera Rubinchik-->
    <head>
        <title>Tip of the day</title>    
    </head>
    
    <body style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;">
        <h1>Tip of the day</h1>
        <?php
$x=1;

$y=5;

$sum = $y - $x;

print "$y - $x = $sum";

?>
        
        <div style="background-color:white; border-color: #0084ff; border-style:outset; border-width:30px; text-align: center;">
        <br>
        <?php
        readfile("tips.txt");
        ?>
            <br><br>
        </div>
        <br><br>
        <a href="tipphp.txt">Link to source code</a>
        
    
    </body>


</html>