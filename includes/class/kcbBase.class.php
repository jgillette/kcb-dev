<?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(-1);

    /*
		This class is the base KCB class. All top level functions should be included here
	*/
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require("3rd-party/phpmailer-6.5.3/Exception.php");
    require("3rd-party/phpmailer-6.5.3/PHPMailer.php");
    require("3rd-party/phpmailer-6.5.3/SMTP.php");
    require("log.class.php");

class KcbBase
{
    private $log;

    public function __construct()
    {
        // Show errors if dev environment
        $this->defaultSettings($this->isDevEnv());
        $this->log = new Log();

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function LogError($message)
    {
        $this->log->write($message);
    }

    public function sendEmail($toAddress, $message, $title, $html = true)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'keystoneconcertband-com.mail.protection.outlook.com';                   //Set the SMTP server to send through
            $mail->SMTPAuth   = false;                                   //Enable SMTP authentication
            $mail->Port       = 25;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('web@keystoneconcertband.com', 'Keystone Concert Band');
            $mail->addAddress('JonathanG@keystoneconcertband.com', 'Jonathan Gillette');     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Test email';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            return $mail->send();

            /*
            if ($html) {
                // To send HTML mail, the Content-type header must be set
                $headers[] = 'MIME-Version: 1.0';
                $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            }

            // Additional headers
            $headers[] = 'From: KCB Website <web@keystoneconcertband.com>';
            $headers[] = 'Reply-To: web@keystoneconcertband.com';
            $headers[] = 'X-Mailer: PHP/' . phpversion();

            return mail($toAddress, $title, $message, implode("\r\n", $headers));
            */
        } catch (Exception $e) {
            $this->LogError($e->getMessage());
            return false;
        }
    }

    private function defaultSettings($showErrors)
    {
        if ($showErrors) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(-1);
        }

        // Set timezone so that times are displayed correctly
        date_default_timezone_set('America/New_York');

        // Set admin email address errors should go to
        $admin_email = 'webmaster@keystoneconcertband.com';
    }

    private function isDevEnv()
    {
        if (strpos($_SERVER['SERVER_NAME'], 'dev') !== false || strpos($_SERVER['SERVER_NAME'], 'refresh') !== false) {
            return true;
        } else {
            return false;
        }
    }
}
