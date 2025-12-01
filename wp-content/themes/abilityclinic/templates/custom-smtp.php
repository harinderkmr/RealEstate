<?php
/**
 * Currently not using file 
 */
require_once "Mail.php";

function customSMTP(){
    $from = "SHARMA NITIN";
    $to = "testingbull07@gmail.com";
    $subject = "About the condition of body";
    $body = "Condition of body: whole ultrasound of body";

    $host = "sandbox.smtp.mailtrap.io";
    $username = "2b78c5b5f4c810";
    $password = "88301caf560509";
    $port = 587;

    $headers = array('From' => $from, 'To' => $to, 'Subject' => $subject);

    $smtp = Mail::factory('smtp', array (
        'host' => $host,
        'auth' => true,
        'port' => $port, // Fixed port assignment
        'username' => $username,
        'password' => $password
    ));

    $mail = $smtp->send($to, $headers, $body);

    if (PEAR::isError($mail)) {
        return array('success' => false, 'error' => $mail->getMessage());
    } else {
        return array('success' => true);
    }
}

// Output JSON response
echo json_encode(customSMTP());
?>