<?php // adduser.php

  // Start with the PHP code

  $firstname = $surname = $username = $password = $age = $email = $zipcode = $yearofbirth = "";

  if (isset($_POST['firstname']))
    $firstname = fix_string($_POST['firstname']);
  if (isset($_POST['surname']))
    $surname  = fix_string($_POST['surname']);
  if (isset($_POST['username']))
    $username = fix_string($_POST['username']);
  if (isset($_POST['password']))
    $password = fix_string($_POST['password']);
  if (isset($_POST['age']))
    $age      = fix_string($_POST['age']);
  if (isset($_POST['email']))
    $email    = fix_string($_POST['email']);
  if (isset($_POST['zipcode']))
    $zipcode    = fix_string($_POST['zipcode']);
  if (isset($_POST['yearofbirth']))
    $yearofbirth = fix_string($_POST['yearofbirth']);

  $fail  = validate_firstname($firstname);
  $fail .= validate_surname($surname);
  $fail .= validate_username($username);
  $fail .= validate_password($password);
  $fail .= validate_age($age);
  $fail .= validate_email($email);
  $fail .= validate_zipcode($zipcode);
  $fail .= validate_yearofbirth($yearofbirth);


  echo "<!DOCTYPE html>\n<html><head><title>An Example Form</title>";

  if ($fail == "")
  {
    echo "</head><body>Form data successfully validated:
      $firstname, $surname, $username, $password, $age, $email, $zipcode = $yearofbirth.</body></html>";

    // This is where you would enter the posted fields into a database,
    // preferably using hash encryption for the password.

    exit;
  }

  echo <<<_END

    <!-- The HTML/JavaScript section -->

    <style>
      .signup {
        border:1px solid black;
        font:  normal 20px;
        color: black;
      }
      #fixedTable {
	position:fixed;
	width:300px;
	top:40px;
	left:0px;
        }
    
        .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 20%;
}
    
    </style>

    <script>
      function validate(form)
      {
        fail  = validateForename(form.firstname.value)
        fail += validateSurname(form.surname.value)
        fail += validateUsername(form.username.value)
        fail += validatePassword(form.password.value)
        fail += validateAge(form.age.value)
        fail += validateEmail(form.email.value)
        fail += validateZipcode(form.zipcode.value)
        fail += validateYearOfBirth(form.YearOfBirth.value)
      
        if (fail == "")     return true
        else { alert(fail); return false }
      }

      function validateForename(field)
      {
        return (field == "") ? "No Forename was entered.\\n" : ""
      }

      function validateSurname(field)
      {
        return (field == "") ? "No Surname was entered.\\n" : ""
      }

      function validateUsername(field)
      {
        if (field == "") return "No Username was entered.\\n"
        else if (field.length < 5)
          return "Usernames must be at least 5 characters.\\n"
        else if (/[^a-zA-Z0-9_-]/.test(field))
          return "Only a-z, A-Z, 0-9, - and _ allowed in Usernames.\\n"
        return ""
      }

      function validatePassword(field)
      {
        if (field == "") return "No Password was entered.\\n"
        else if (field.length < 6)
          return "Passwords must be at least 6 characters.\\n"
        else if (!/[a-z]/.test(field) || ! /[A-Z]/.test(field) ||
                 !/[0-9]/.test(field))
          return "Passwords require one each of a-z, A-Z and 0-9.\\n"
        return ""
      }

      function validateAge(field)
      {
        if (isNaN(field)) return "No Age was entered.\\n"
        else if (field < 18 || field > 110)
          return "Age must be between 18 and 110.\\n"
        return ""
      }

      function validateEmail(field)
      {
        if (field == "") return "No Email was entered.\\n"
          else if (!((field.indexOf(".") > 0) &&
                     (field.indexOf("@") > 0)) ||
                    /[^a-zA-Z0-9.@_-]/.test(field))
            return "The Email address is invalid.\\n"
        return ""
      }
      function validateZipcode(field)
	  {
		if (field == "" || isNaN(field)) return "No Zipcode inputted.\n"
		else if (field.length != 5)
		  return "5 numeric characters must be entered.\\n"
		return ""
	  }
      function validateYearOfBirth(field)
	  {
		if (field == "" || isNaN(field)) return "No year was entered.\n"
		else if (field.length != 4)
		  return "4 numeric characters must be entered.\\n"
		return ""
	  }
    </script>
    <script src="validatefunctions.js"></script>
  </head>
  <body style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;">
    <table class="signup" border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee" id="fixedTable">
      <th colspan="2" align="center">Signup Form</th>

        <tr><td colspan="2">Sorry, the following errors were found<br>
          in your form: <p><font color=red size=1><i>$fail</i></font></p>
        </td></tr>

      <form method="post" action="adduser.php" onSubmit="return validate(this)">
        <tr><td>First name</td>
          <td><input type="text" maxlength="32" name="firstname" value="$firstname">
        </td></tr><tr><td>Surname</td>
          <td><input type="text" maxlength="32" name="surname"  value="$surname">
        </td></tr><tr><td>Username</td>
          <td><input type="text" maxlength="16" name="username" value="$username">
        </td></tr><tr><td>Password</td>
          <td><input type="text" maxlength="12" name="password" value="$password">
        </td></tr><tr><td>Age</td>
          <td><input type="text" maxlength="3"  name="age"      value="$age">
        </td></tr><tr><td>Email</td>
          <td><input type="text" maxlength="64" name="email"    value="$email">
        </td></tr><tr><td>Zipcode</td>
          <td><input type="text" maxlength="64" name="zipcode"    value="$zipcode">
        </td></tr><tr><td>Year of Birth</td>
          <td><input type="text" maxlength="64" name="yearofbirth"    value="$yearofbirth">
        </td></tr><tr><td colspan="2" align="center"><input type="submit"
          value="Signup"></td></tr>
      </form>
    </table>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <img id='object' src='pitt.png' width="20%" class="center">
      <script>
      O('object').onmouseover = function() { this.src = 'mascot.png' }
      O('object').onmouseout  = function() { this.src = 'pitt.png'  }
    </script> 
    <h1>
      
            Bacon ipsum dolor amet venison brisket sirloin turducken, hamburger short loin ham tongue fatback meatball jerky tail tri-tip. Jowl ground round kevin, bresaola jerky tail brisket shoulder turkey spare ribs boudin pig. Filet mignon alcatra andouille tail leberkas shank tenderloin cupim frankfurter tri-tip rump pastrami landjaeger short loin bresaola. Ribeye ground round short loin ham hock buffalo. Prosciutto jerky pork chop boudin tri-tip short ribs tenderloin alcatra kielbasa jowl shoulder pastrami beef ribs cupim burgdoggen. Chuck landjaeger biltong, alcatra pork belly corned beef tri-tip swine t-bone ham rump jowl doner short loin turkey. Jerky pancetta tongue biltong t-bone hamburger meatloaf porchetta bresaola prosciutto.

        Sausage swine ham tri-tip. Fatback jowl salami landjaeger drumstick prosciutto spare ribs. Picanha filet mignon alcatra strip steak frankfurter meatloaf boudin pancetta bacon jowl sausage. Salami alcatra pork filet mignon chicken corned beef, pig landjaeger brisket kielbasa short loin. Chuck pork belly cupim tail leberkas pastrami capicola andouille hamburger pork jowl cow salami tri-tip pork loin.

        Alcatra sausage bresaola corned beef tenderloin ground round prosciutto ribeye fatback beef ribs. Venison picanha turducken rump, kielbasa burgdoggen meatloaf shankle capicola. Shoulder meatloaf biltong beef ribs jerky, landjaeger prosciutto ribeye pork belly. Kielbasa burgdoggen porchetta tail shankle jowl. Cupim ribeye filet mignon beef ribs, spare ribs ham hock jerky leberkas ham turducken shoulder picanha.

        Leberkas kielbasa ham hock shankle, ham ribeye pig beef short loin meatball drumstick landjaeger cupim. Ham hock bresaola spare ribs, alcatra t-bone shank rump salami tongue fatback landjaeger pork loin beef ribs kevin. Alcatra pastrami doner venison pig t-bone salami pork pork loin buffalo burgdoggen pork chop tail capicola kevin. Pig chicken capicola spare ribs meatball, turducken sausage pork jerky. Ground round tenderloin rump tri-tip tongue, pork belly doner filet mignon frankfurter pancetta short loin sausage pork burgdoggen bresaola.

        Ribeye buffalo kevin ham hock, porchetta filet mignon cow shankle tenderloin pork short ribs. Pastrami bresaola turkey tenderloin boudin porchetta, alcatra landjaeger shoulder sirloin pork meatloaf doner ball tip. Ham pork loin venison spare ribs pork belly drumstick meatball cupim ground round prosciutto pork chop fatback bacon ham hock. Sausage pork tenderloin burgdoggen short loin picanha. Ham hock ball tip jowl biltong spare ribs cupim capicola, chuck boudin tail kevin prosciutto buffalo. Capicola turkey pancetta, shoulder chicken shank buffalo pork meatloaf jowl sausage prosciutto. Cow venison pork loin doner drumstick ground round kielbasa meatball shankle.

        Buffalo tri-tip sirloin, burgdoggen pork belly brisket beef ribs tongue venison fatback short loin pork loin meatball. Flank leberkas sirloin, jowl bresaola biltong fatback chuck pork chop porchetta meatball pig doner bacon. Pork chop filet mignon turkey, jowl flank turducken ham hock kevin beef ribs brisket chicken. Corned beef bresaola turkey kevin, salami ground round pancetta.

        Kevin ham tenderloin, t-bone chicken landjaeger short ribs chuck. Turducken swine chuck, cow tail strip steak filet mignon turkey. Jowl frankfurter flank burgdoggen, prosciutto ham spare ribs andouille pig sausage bresaola filet mignon. Leberkas andouille meatloaf filet mignon cupim boudin hamburger alcatra turkey chicken capicola beef ribs. Ball tip frankfurter short loin shoulder bresaola fatback shankle strip steak turducken spare ribs buffalo flank sirloin.

        Spare ribs sirloin burgdoggen kielbasa tenderloin. Fatback picanha shank pig flank filet mignon shoulder turducken pastrami pork belly strip steak ball tip bresaola chuck. Rump doner kielbasa pancetta. Salami landjaeger jowl ham hock, brisket strip steak picanha sausage chicken meatloaf pancetta fatback. Filet mignon landjaeger shank ground round, pig tongue turkey andouille corned beef ham biltong pork pork belly beef ribs.

        Prosciutto ground round filet mignon jowl, drumstick landjaeger cow pork loin kevin alcatra shank. Beef ribs spare ribs salami drumstick tail leberkas tongue. Jowl filet mignon pork ham pork belly salami. Ribeye turducken alcatra buffalo sausage meatball jerky hamburger. Boudin shank cupim ribeye.

        Turducken shankle prosciutto shank shoulder sausage. Jerky pastrami tri-tip filet mignon picanha sirloin venison pork salami. Ham hock bacon flank, tenderloin tail pig leberkas alcatra. Brisket boudin picanha beef ribs filet mignon.

              Bacon ipsum dolor amet venison brisket sirloin turducken, hamburger short loin ham tongue fatback meatball jerky tail tri-tip. Jowl ground round kevin, bresaola jerky tail brisket shoulder turkey spare ribs boudin pig. Filet mignon alcatra andouille tail leberkas shank tenderloin cupim frankfurter tri-tip rump pastrami landjaeger short loin bresaola. Ribeye ground round short loin ham hock buffalo. Prosciutto jerky pork chop boudin tri-tip short ribs tenderloin alcatra kielbasa jowl shoulder pastrami beef ribs cupim burgdoggen. Chuck landjaeger biltong, alcatra pork belly corned beef tri-tip swine t-bone ham rump jowl doner short loin turkey. Jerky pancetta tongue biltong t-bone hamburger meatloaf porchetta bresaola prosciutto.

        Sausage swine ham tri-tip. Fatback jowl salami landjaeger drumstick prosciutto spare ribs. Picanha filet mignon alcatra strip steak frankfurter meatloaf boudin pancetta bacon jowl sausage. Salami alcatra pork filet mignon chicken corned beef, pig landjaeger brisket kielbasa short loin. Chuck pork belly cupim tail leberkas pastrami capicola andouille hamburger pork jowl cow salami tri-tip pork loin.

        Alcatra sausage bresaola corned beef tenderloin ground round prosciutto ribeye fatback beef ribs. Venison picanha turducken rump, kielbasa burgdoggen meatloaf shankle capicola. Shoulder meatloaf biltong beef ribs jerky, landjaeger prosciutto ribeye pork belly. Kielbasa burgdoggen porchetta tail shankle jowl. Cupim ribeye filet mignon beef ribs, spare ribs ham hock jerky leberkas ham turducken shoulder picanha.

        Leberkas kielbasa ham hock shankle, ham ribeye pig beef short loin meatball drumstick landjaeger cupim. Ham hock bresaola spare ribs, alcatra t-bone shank rump salami tongue fatback landjaeger pork loin beef ribs kevin. Alcatra pastrami doner venison pig t-bone salami pork pork loin buffalo burgdoggen pork chop tail capicola kevin. Pig chicken capicola spare ribs meatball, turducken sausage pork jerky. Ground round tenderloin rump tri-tip tongue, pork belly doner filet mignon frankfurter pancetta short loin sausage pork burgdoggen bresaola.

        Ribeye buffalo kevin ham hock, porchetta filet mignon cow shankle tenderloin pork short ribs. Pastrami bresaola turkey tenderloin boudin porchetta, alcatra landjaeger shoulder sirloin pork meatloaf doner ball tip. Ham pork loin venison spare ribs pork belly drumstick meatball cupim ground round prosciutto pork chop fatback bacon ham hock. Sausage pork tenderloin burgdoggen short loin picanha. Ham hock ball tip jowl biltong spare ribs cupim capicola, chuck boudin tail kevin prosciutto buffalo. Capicola turkey pancetta, shoulder chicken shank buffalo pork meatloaf jowl sausage prosciutto. Cow venison pork loin doner drumstick ground round kielbasa meatball shankle.

        Buffalo tri-tip sirloin, burgdoggen pork belly brisket beef ribs tongue venison fatback short loin pork loin meatball. Flank leberkas sirloin, jowl bresaola biltong fatback chuck pork chop porchetta meatball pig doner bacon. Pork chop filet mignon turkey, jowl flank turducken ham hock kevin beef ribs brisket chicken. Corned beef bresaola turkey kevin, salami ground round pancetta.

        Kevin ham tenderloin, t-bone chicken landjaeger short ribs chuck. Turducken swine chuck, cow tail strip steak filet mignon turkey. Jowl frankfurter flank burgdoggen, prosciutto ham spare ribs andouille pig sausage bresaola filet mignon. Leberkas andouille meatloaf filet mignon cupim boudin hamburger alcatra turkey chicken capicola beef ribs. Ball tip frankfurter short loin shoulder bresaola fatback shankle strip steak turducken spare ribs buffalo flank sirloin.

        Spare ribs sirloin burgdoggen kielbasa tenderloin. Fatback picanha shank pig flank filet mignon shoulder turducken pastrami pork belly strip steak ball tip bresaola chuck. Rump doner kielbasa pancetta. Salami landjaeger jowl ham hock, brisket strip steak picanha sausage chicken meatloaf pancetta fatback. Filet mignon landjaeger shank ground round, pig tongue turkey andouille corned beef ham biltong pork pork belly beef ribs.

        Prosciutto ground round filet mignon jowl, drumstick landjaeger cow pork loin kevin alcatra shank. Beef ribs spare ribs salami drumstick tail leberkas tongue. Jowl filet mignon pork ham pork belly salami. Ribeye turducken alcatra buffalo sausage meatball jerky hamburger. Boudin shank cupim ribeye.

        Turducken shankle prosciutto shank shoulder sausage. Jerky pastrami tri-tip filet mignon picanha sirloin venison pork salami. Ham hock bacon flank, tenderloin tail pig leberkas alcatra. Brisket boudin picanha beef ribs filet mignon.
      </h1>
  </body>
</html>

_END;

  // The PHP functions

  function validate_firstname($field)
  {
      return ($field == "") ? "No first name was entered<br>": "";
  }
  
  function validate_surname($field)
  {
      return($field == "") ? "No Surname was entered<br>" : "";
  }
  
  function validate_username($field)
  {
    if ($field == "") return "No Username was entered<br>";
    else if (strlen($field) < 5)
      return "Usernames must be at least 5 characters<br>";
    else if (preg_match("/[^a-zA-Z0-9_-]/", $field))
      return "Only letters, numbers, - and _ in usernames<br>";
    return "";        
  }
  
  function validate_password($field)
  {
    if ($field == "") return "No Password was entered<br>";
    else if (strlen($field) < 6)
      return "Passwords must be at least 6 characters<br>";
    else if (!preg_match("/[a-z]/", $field) ||
             !preg_match("/[A-Z]/", $field) ||
             !preg_match("/[0-9]/", $field))
      return "Passwords require 1 each of a-z, A-Z and 0-9<br>";
    return "";
  }
  
  function validate_age($field)
  {
    if ($field == "") return "No Age was entered<br>";
    else if ($field < 18 || $field > 110)
      return "Age must be between 18 and 110<br>";
    return "";
  }
  
  function validate_email($field)
  {
    if ($field == "") return "No Email was entered<br>";
      else if (!((strpos($field, ".") > 0) &&
                 (strpos($field, "@") > 0)) ||
                  preg_match("/[^a-zA-Z0-9.@_-]/", $field))
        return "The Email address is invalid<br>";
    return "";
  }

  function validate_zipcode($field)
  {
	if ($field == "") return "No zipcode was entered.<br>";
	else if (strlen($field) != 5)
      return "5 numeric characters must be entered.<br>";
	return "";
  }

  function validate_yearofbirth($field)
  {
    if ($field == "") return "No Year of Birth was entered.<br>";
	else if (strlen($field) != 4)
      return "4 numeric characters must be entered.<br>";
	return "";
  }
  
  function fix_string($string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return htmlentities ($string);
  }
  //echo "<br><br><br><h3>SOURCE CODE:</h3><br><br>";
  //show_source("adduser.php");
?>