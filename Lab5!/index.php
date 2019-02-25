<?php
  $name = $weight = $height = $email = $comment = $fail = $calculated = "";
  if (isset($_POST['nameInput'])) $name = fix_string($_POST['nameInput']);
  if (isset($_POST['weightInput'])) $weight = fix_string($_POST['weightInput']);
  if (isset($_POST['heightInput'])) $height = fix_string($_POST['heightInput']);
  
  
//Input validations
  $fail  = validateName($name);
  $fail  .= validateWeight($weight);
  $fail  .= validateHeight($height);


  
  function validateName($field)
  {
    return ($field == "") ? "Enter your first name please.<br>" : "";
  }
  function validateWeight($field)
  {
	if ($field == "") return "Enter your weight in pounds.<br>";
    else if ($field <= 0)
      return "Weight must be a positive numeric value.<br>";
    return "";
  }
  function validateHeight($field)
  {
    if ($field == "") return "Enter your height in inches.<br>";
    else if ($field <= 0)
      return "Height must be a postive numeric value.<br>";
    return "";
  }
  
  function fix_string($string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return htmlentities ($string);
  }
  

//BMI Calculations
  if ($fail == ""){
	$weight = $weight/2.2046; 
	$height = $height*0.0254;
	$bmi = $height*$height;
	$bmi = $weight/$bmi;
	$bmi = round($bmi, 2);
	switch(true){
		case ($bmi > 0 and $bmi < 18.5):
			$calculated = "underweight. ";
			break;
		case ($bmi < 24.9):
			$calculated = "normal weight. ";
			break;
		case ($bmi < 29.9):
			$calculated = "overweight. ";
			break;
		case ($bmi >= 29.9):
			$calculated = "obese. ";
			break;
		default:
			$calculated = "";
	}
      
	$print = "Due to your BMI you are considered ";
      
	$print .= $calculated;
      
    $print .= "Your BMI is ";
      
	$print .= $bmi;
      
	$calculated = $print;
      
	$headers = "From: ";
      
	$headers .= $email;
      
	ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
      
        $from = "mrubinchik9@gmail.com";

        $to = "$email";

        $subject = "PHP Mail Test script";

        $message = "This is a test to check the PHP Mail functionality";

        $headers = "From:" . $from;

  }
  
  
  echo <<<_END
  <html>
    <head>
      <title>Lab5</title>
      <link rel="stylesheet" href="style.css">
    </head>
    <body>
    
   
    
    <form method="post" action="index.php">
     <h1>BMI Calculation</h1>
        <h4>Please enter your first name:*</h4>
        <input type="text" name="nameInput"><br>
        
        <h4>Please enter your weight in pounds:*</h4>
        <input type="text" name="weightInput"><br>
        
	    <h4>Please enter your height in inches:* </h4>
        <input type="text" name="heightInput"><br>
        
	  <br><input class="submit" type="submit">
      
	  <br>$calculated<br>$fail
    </form>
    <br><br>
    
    <form action="mailto:mrubinchik9@gmail.com" method="post" enctype="text/plain">
    <h1>What did you think?</h1>
	   <h4>E-mail:</h4>
	   <input type="text" name="emailInput"><br>
	
	   <h4>Feedback & Comments:</h4>
	   <input type="text" name="comment" size="50"><br><br>
	
	   <input class="submit" type="submit" value="Submit">
	
	</form>
    
    
	<a href="lab5.txt">Click here for source code</a>    
    
    </body>
  </html>
_END;
?>