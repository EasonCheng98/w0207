<?php

    require 'vendor/autoload.php';
    use Mailgun\Mailgun;

    class Emailer 
    {
        public function sendmail($subject, $content){

            $mgClient = new Mailgun('5a1ab6a9f2ea3a473caccfeae35a1a6e-07ec2ba2-50f05758');
            $domain = "sandboxa7ed3216ecc64e1f9aac8fde521ef923.mailgun.org";
            # Make the call to the client.
            $result = $mgClient->sendMessage($domain, array(
            'from'	=> 'Automail <postmaster@sandboxa7ed3216ecc64e1f9aac8fde521ef923.mailgun.org>',
            'to'	=> 'Eason <eason.cheng@i-tea.com.tw>',
            'subject' => $subject,
            'text'	=> $content
            ));

        }

    }




?>
