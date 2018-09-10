<?phprequire_once "../vendor/autoload.php";

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.mail.ru', '587','tls'))
    ->setUsername('sergey_gerasimov_2019@mail.ru')
    ->setPassword('S123456');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
    ->setFrom(['sergey_gerasimov_2019@mail.ru' => 'sadsd'])
    ->setTo(['sergey_gerasimov_2019@mail.ru' => 'A name'])
    ->setBody('Here is the message itself');

// Send the message
$result = $mailer->send($message);
print_r($result);

