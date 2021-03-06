<?php
class UNL_WDN_Emailer_Main
{
    public $to_address;

    public $cc_address;

    public $bcc_address;

    public $from_address;

    public $subject;

    public $html_body;

    public $text_body;

    public $web_view_uri;

    public function toHTML()
    {

        $savvy = new Savvy();
        $savvy->setTemplatePath(dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/data');

        $html = $savvy->render($this, 'WDNEmailTemplate.tpl.php');
        return $html;
    }

    public function toTxt()
    {
        return $this->text_body;
    }

    public function send()
    {
        $hdrs = array(
            'From'    => $this->from_address,
            'Subject' => $this->subject,
            'To'      => $this->to_address,
            'Cc'      => $this->cc_address);

        require_once 'Mail/mime.php';
        $mime = new Mail_mime("\n");

        if (isset($this->text_body)) {
            $mime->setTXTBody($this->toTxt());
        }

        $mime->setHTMLBody($this->toHtml());

        $body = $mime->get();
        $hdrs = $mime->headers($hdrs);
        $mail =& Mail::factory('sendmail');

        $recipients = $this->to_address;
        if (!empty($this->cc_address)) {
            $recipients .= "," . $this->cc_address;
        }

        if (!empty($this->bcc_address)) {
            $recipients .= "," . $this->bcc_address;
        }

        // Send the email!
        $mail->send($recipients, $hdrs, $body);
        return true;
    }
}