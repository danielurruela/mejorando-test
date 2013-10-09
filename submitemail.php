<?php

$to = "dorashepro@spanishmadefriendly.com"; // Replace with your email address
$subject = "Message from ".ucwords($_POST['name']); // Enter the subject here.



//Validating email addres
$email = $_POST['email'];

function validateEmail($email)
{
   if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
	  return true;
   else
	  return false;
}


//Validates the required fields
if((strlen($_POST['name']) < 1 ) || (strlen($email) < 1 ) || (strlen($_POST['message']) < 1 ) || validateEmail($email) == FALSE){
	$emailerror .= true;


} else {

	$emailerror .= false;

	
//Composing the email
	$email_message =
		"Name: " . ucwords($_POST['name']) . "\n" .
		"Email: " . $email . "\n" .
		"Subject: " . $subject . "\n" .
		"Message: " . "\n" . $_POST['message'] . "\n";
	
//Sending the email
	mail($to, $subject, $email_message);
}

?>

<?php 

if($emailerror == true) {
	echo '<span>Please fill all the fields.</span>';
}
else
{
	echo "<span>Message has been sent. Thank you!</span>";
}	


?>
