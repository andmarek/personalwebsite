<?php>
$from = '<website@outlook.com>';
$sendTo = '<andmarek@outlook.com';
$subject = 'Message from contact form';
$fields = array('name'=>'Name', 'lastName'=>'Last Name', 'phone'=> 'Phone', 'email'=>'Email', 'message' => 'Message);'

  $sentMessage = 'Contact form submitted successfully!'
  $errorMessage = 'Error while submitting form.  Please try again later.'

  error_reporting(E_ALL & ~E_NOTICE);

try {
  if(count($_POST) == 0) throw new \Exception('Form is empty');
  $emailText = "You have a new message from your contact form\n";

  foreach($_POST as $key => $value) {
    if(isset($fields[$key])) {
      $emailText .= "$fields[$key]: $value\n"
    }
  }

  //Headers for email
  $headers = array('Content-Type: text/plain; charset="UTF-8"';
  'From: ' . $from,
    'Reply-To: ' . $from,
    'Return-Path: ' .$from ,
  );

  //Send

  mail($sendTo, $subject, $emailText, implode("\n", $headers));
  $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
  $responserArray = array('type' => 'danger', 'message' => $errorMessage);
}
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_WITH']) == 'xmlhttprequest') {
  $encoded = json_encode($responseArray);
  header('Context-Type: application/json');
  echo $encoded;
}
else {
  echo $responseArray['message'];

}



