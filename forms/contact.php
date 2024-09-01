<?php
$receiving_email_address = 'shresthamanoj2060@gmail.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = isset($_POST['name']) ? $_POST['name'] : 'No name provided';
$contact->from_email = isset($_POST['email']) ? $_POST['email'] : 'No email provided';
$contact->subject = isset($_POST['subject']) ? $_POST['subject'] : 'No subject provided';

$contact->add_message($contact->from_name, 'From');
$contact->add_message($contact->from_email, 'Email');
$contact->add_message(isset($_POST['message']) ? $_POST['message'] : 'No message provided', 'Message', 10);

echo $contact->send();
?>
