<?php

namespace App\Enhancers;

use Blaze\Http\Mail;
use Blaze\Logger\Log;
use Blaze\TemplateEngine\Template;

/**
 * MailNotification Class
 */
class MailNotification extends Template
{
	/**
     * Get mail template for mail notifications.
	 * @param string $message
	 * @return mixed
	 */
	public function getMailTemplate(string $message, $return=TRUE)
	{
		$this->setFileLocation("mail.html");

		$this->set('message', $message);

		return $this->display($return);
	}

	/**
	 * Send notification mail.
	 * @param string $fullName
	 * @param string $email
	 * @param string $mailTitle
	 * @param string $messageBody
	 * @return bool
	 */
	public function sendNotificationMail(string $fullName, string $email, string $mailTitle, string $messageBody) : bool
	{
	    $SMTPConfig     = Mail::setSMTP(MAIL_HOST, MAIL_USERNAME, MAIL_PASSWORD, MAIL_SMTPSECURE, MAIL_PORT);
	    $emailBody      = Mail::setBody(strip_tags($mailTitle), minifyHTMLOutput($messageBody));
	    $from       	= Mail::setEmail(MAIL_EMAIL, \Detail::appName());
        $to     		= Mail::setEmail($email, $fullName);
        $user 			= "$fullName @: $email";
        Mail::sendHtmlEmail($emailBody, $to, $from, $from, $SMTPConfig);
    	if (!Mail::$result):
		    (new Log("Mail Notification wasn't sent to $user", "ERROR"))->setLogFile("mailLog.txt")->logMessage();
		    (new Log("Error Message:- ".Mail::$errorMessage." User:- $user", "ERROR"))->setLogFile("mailErrorLog.txt")->logMessage();
	    else:
		    (new Log("Mail Notification was sent to $user", "SUCCESS"))->setLogFile("mailLog.txt")->logMessage();
	    endif;
	    return Mail::$result;
	}

	/**
	 * Send notification mail.
	 * @param string $fullName
	 * @param string $email
	 * @param string $mailTitle
	 * @param string $messageBody
	 * @param \stdClass $attachment
	 * @return bool
	 */
	public function sendNotificationMailWithAttachment(string $fullName, string $email, string $mailTitle, string $messageBody, \stdClass $attachment) : bool
	{
	    $SMTPConfig     = Mail::setSMTP(MAIL_HOST, MAIL_USERNAME, MAIL_PASSWORD, MAIL_SMTPSECURE, MAIL_PORT);
	    $emailBody      = Mail::setBody(strip_tags($mailTitle), minifyHTMLOutput($messageBody));
	    $from       	= Mail::setEmail(MAIL_EMAIL, \Detail::appName());
        $to     		= Mail::setEmail($email, $fullName);
        $user 			= "$fullName @: $email";
        Mail::sendWithAttachment($emailBody, $to, $from, $from, $attachment, $SMTPConfig);
    	if (!Mail::$result):
		    (new Log("Mail Notification wasn't sent to $user", "ERROR"))->setLogFile("mailLog.txt")->logMessage();
		    (new Log("Error Message:- ".Mail::$errorMessage." User:- $user", "ERROR"))->setLogFile("mailErrorLog.txt")->logMessage();
	    else:
		    (new Log("Mail Notification was sent to $user", "SUCCESS"))->setLogFile("mailLog.txt")->logMessage();
	    endif;
	    return Mail::$result;
	}

	/**
	 * Send notification mail to newly registered user.
	 * @param \User $newUser
	 * @return bool
	 */
	public function toConfirmNewUserAccount(\User $newUser) : bool
	{
		$title = "Welcome, {$newUser->firstName}";
		$messageText = "We're thrilled to have you here! Get ready to dive into your new account.
			<p style='margin: 8px 0; font-weight:bold;font-size:22px;'>Hi, {$newUser->firstName}.</p>
			<p style='margin: 8px 0;'>We're excited to have you get started. First, you need to confirm your account then login with the login details below.</p>
			<p style='margin: 8px 0;'>Email: <b>{$newUser->email}</b></p>";
		$messageBody = $this->getMailTemplate($messageText);
		return $this->sendNotificationMail($newUser->firstName, $newUser->email, $title, $messageBody);
	}
}
