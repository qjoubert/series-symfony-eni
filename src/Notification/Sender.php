<?php

namespace App\Notification;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Security\Core\User\UserInterface;

class Sender
{
    public function __construct(protected MailerInterface $mailer) {}

    public function sendNewUserNotificationToAdmin(UserInterface $user): void
    {
        $email = new Email();
        $email
            ->from('account@series.com')
            ->to('admin@series.com')
            ->subject('new account created on series.com!')
            ->html('<h1>New account!</h1>email: ' . $user->getEmail());
        $this->mailer->send($email);
    }
}