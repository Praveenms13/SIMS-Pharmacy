<?php

use Mailtrap\Config;
use Mailtrap\Helper\ResponseHelper;
use Mailtrap\MailtrapClient;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Mailtrap\EmailHeader\CategoryHeader;

require __DIR__ . '/vendor/autoload.php';

$apiKey = 'eaad2fb0332499f1fcfb10d89606045b';
$mailtrap = new MailtrapClient(new Config($apiKey));

$email = (new Email())
    ->from(new Address('mailtrap@praveenms.live', 'Mailtrap Test'))
    ->to(new Address("mspraveenkumar77@gmail.com"))
    ->subject('You are awesome!')
    ->text('Congrats for sending test email with Mailtrap!');

$email->getHeaders()
    ->add(new CategoryHeader('Integration Test'));

$response = $mailtrap->sending()->emails()->send($email);

var_dump(ResponseHelper::toArray($response));
