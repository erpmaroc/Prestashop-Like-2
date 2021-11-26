<?php

namespace depexorPackages\Core\tests;

use depexorPackages\Utils\Mail\MailSender;

/**
 * Run test
 * @author Bobi Slaveykvo depexor
 * @command php phpunit.phar --filter MailSenderTest
 */
class MailSenderTest extends TestCase
{
    public function testSend()
    {
        $to = 'bobi@depexor.com';
        $subject = 'Email subject';
        $replyTo = 'Reply to';
        $content = 'This is example message.';
        $from = 'peter@depexor.com';
        $fromName = 'Peter depexor';

        $mail = new MailSender();
        $mail->setEmailTo($to);
        $mail->setEmailSubject($subject);
        $mail->setEmailReplyTo($replyTo);
        $mail->setEmailMessage($content);
        $mail->setEmailFrom($from);
        $mail->setEmailFromName($fromName);
        $mail->send();

        $checkEmailContent = MailSender::$last_send;

        $this->assertSame($checkEmailContent['content'], $content);
        $this->assertSame($checkEmailContent['from_name'], $fromName);
        $this->assertSame($checkEmailContent['from'], $from);
        $this->assertSame($checkEmailContent['to'], $to);
        $this->assertSame($checkEmailContent['subject'], $subject);
    }

}
