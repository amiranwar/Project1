<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "amiranwar612@gmail.com";
 
    $email_subject = "Volunteer Requst Form";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['firstname']) ||
 
        !isset($_POST['lastname']) ||
 
        !isset($_POST['gender']) ||
 
        !isset($_POST['contactnumber']) ||
		!isset($_POST['emailaddress']) ||
		!isset($_POST['occupation']) ||
		!isset($_POST['country']) ||
		!isset($_POST['email']) ||
		!isset($_POST['Howyoufoundus']) ||
		!isset($_POST['postalcode']) ||
 
        !isset($_POST['comments'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $first_name = $_POST['firstname']; // required
 
    $last_name = $_POST['lastname']; // required
 
    $email_from = $_POST['gender']; // required
 
    $telephone = $_POST['contactnumber']; // not required
 
    $comments = $_POST['emailaddress']; // required
	$comments = $_POST['occupation']; // required
	$comments = $_POST['country']; // required
	$comments = $_POST['email']; // required
	$comments = $_POST['howyoufoundus']; // required
	$comments = $_POST['postalcode']; // required
	$comments = $_POST['comments']; // required
	
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
	$number_exp = "/^[0-9 .'-]+$/";
 
  if(!preg_match($string_exp,$firstname)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
  if(!preg_match($string_exp,$lastname)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
  
  if(!preg_match($string_exp,$gender)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
  
  if(!preg_match($number_exp,$contactnumber)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
  
  if(!preg_match($string_exp,$emailaddress)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
  
  if(!preg_match($string_exp,$occupation)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
  
  if(!preg_match($string_exp,$country)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
  
  if(!preg_match($string_exp,$email)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
  
  if(!preg_match($string_exp,$howyoufoundus)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
  
  if(!preg_match($string_exp,$postalcode)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
  
 
  if(strlen($comments) < 2) {
 
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "First Name: ".clean_string($firstname)."\n";
 
    $email_message .= "Last Name: ".clean_string($lastname)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Telephone: ".clean_string($gender)."\n";
	$email_message .= "Telephone: ".clean_string($contactnumber)."\n";
	$email_message .= "Telephone: ".clean_string($emailaddress)."\n";
	$email_message .= "Telephone: ".clean_string($occupation)."\n";
	$email_message .= "Telephone: ".clean_string($country)."\n";
	$email_message .= "Telephone: ".clean_string($email)."\n";
	$email_message .= "Telephone: ".clean_string($howyoufoundus)."\n";
	$email_message .= "Telephone: ".clean_string($postalcode)."\n";
 
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
<!-- include your own success html here -->
 
 
 
Thank you for contacting us. We will be in touch with you very soon.
 
 
 
<?php
 
}
 
?>