<!DOCTYPE html> 
<html>
<!--Meera Rubinchik
Write a program that prints the numbers from 100 to 1 (decrement); but for multiples of three, print "Hail To" instead of the number, and for multiples of five, print " Pitt".  For numbers which are multiples of both three and five, print "Hail To Pitt".
-->
    <head>
        <title>Lab 4</title>
    </head>
    
  <body style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: bold;text-align:center;color: #1E555C;background-color: #EEF0F2;">
    <h1 style="color:#0DAB76">Meera Rubinchik</h1>
      <?php 
  $i = 100;
  for($i = 100; $i > 0; $i--)
  {
	  if($i % 15 == 0) echo "Hail To Pitt <br>";
      
	  elseif($i % 5 == 0) echo "Pitt <br>";
      
	  elseif($i % 3 == 0) echo "Hail To <br>";
      
	  else echo "$i <br>";
  }

  echo <<<_END
  <!DOCTYPE html>\n
  <html>
  <head>
  <title>Lab 4</title>
  </head>
  <body>
<br>
    <a href="lab4.txt">SOURCE CODE</a>
  </body>
</html>

_END;

?>

  </body>
</html>