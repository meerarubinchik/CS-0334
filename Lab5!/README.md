<h1>PHP Forms</h1>

 

Use PHP to obtain weight and height from a user, calculate the BMI of the user based on what he/she entered, and then provide the results of the BMI calculation and evaluation to the user. Once the user views the information, he/she should fill in an email form regarding whether they agree with the feedback (underweight, normal, overweight, obese) when the submit button is clicked, a message will be sent.  Further instructions are:


The form should collect a person’s first name, weight, and height
The values entered should then be used to calculate the person’s BMI
Use PHP to convert the pounds to kilograms (divide by 2.2046)
Use PHP to convert inches to meters (multiply inches by .0254)
Use PHP to calculate BMI: take the calculated kilograms and divide by the result of squaring the calculated meters (for example: 150 pounds = 68.03955 kilograms; and 72 inches = 1.8288 meters; BMI = 68.03955/(1.8288 ^2) = 20.34366 kg/m2
The BMI value should then be evaluated against the chart below; the program will then display the person’s calculated BMI, and whether the person is underweight, normal weight, overweight, or obese.
 

BMI Evaluation

BMI < 18.5 = underweight

18.5 < BMI < 24.9 = normal

25 < BMI < 29.9 = overweight

29.9 < BMI = obese

 

The BMI value result and evaluation page/content will also provide an email form for the user to provide feedback and/or ask questions of what to do about their BMI value.  The form should collect the following component values for TO:, SUBJECT:, MESSAGE:, and FROM: (Hint: use the php mail function)
The general format for the PHP mail function is: mail(to,subject,message,headers,parameters);
 

Other requirements:
Validate the form elements (numbers are entered in number boxes and checked for valid ranges of values, text is entered in text boxes, etc.); don’t worry about validating email addresses
Use CSS to format text use colors on the pages (I don’t want to see just black text with default font on a white background)
All form elements should be labeled within the HTML tags so that the user knows what he/she is supposed to enter in the form boxes
Use Form Method = POST
The initial BMI entry/calculation form should submit to itself (see notes on how to do this)
The mail form will send an email when someone clicks submit
