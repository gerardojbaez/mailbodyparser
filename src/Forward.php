<?php

namespace Gerardojbaez\MailBodyParser;

class Forward
{
    /**
     * The name of the original forwarded email sender.
     *
     * @var string|null
     */
    protected $fromName;

    /**
     * The email address of the original forwarded email sender.
     *
     * @var string|null
     */
    protected $fromEmail;

    /**
     * The name of the original forwarded email recipient.
     *
     * @var string|null
     */
    protected $toName;

    /**
     * The email of the original forwarded email recipient.
     *
     * @var string|null
     */
    protected $toEmail;

    /**
     * The subject of the forwarded email.
     *
     * @var string|null
     */
    protected $subject;

    /**
     * Get the name of the original forwarded email sender.
     *
     * @return  string|null
     */ 
    public function getFromName()
    {
        return $this->fromName;
    }

    /**
     * Set the name of the original forwarded email sender.
     *
     * @param  string|null  $fromName  The name of the original forwarded email sender.
     *
     * @return  self
     */ 
    public function setFromName($fromName)
    {
        $this->fromName = $fromName;

        return $this;
    }

    /**
     * Get the email address of the original forwarded email sender.
     *
     * @return  string|null
     */ 
    public function getFromEmail()
    {
        return $this->fromEmail;
    }

    /**
     * Set the email address of the original forwarded email sender.
     *
     * @param  string|null  $fromEmail  The email address of the original forwarded email sender.
     *
     * @return  self
     */ 
    public function setFromEmail($fromEmail)
    {
        $this->fromEmail = $fromEmail;

        return $this;
    }

    /**
     * Get the name of the original forwarded email recipient.
     *
     * @return  string|null
     */ 
    public function getToName()
    {
        return $this->toName;
    }

    /**
     * Set the name of the original forwarded email recipient.
     *
     * @param  string|null  $toName  The name of the original forwarded email recipient.
     *
     * @return  self
     */ 
    public function setToName($toName)
    {
        $this->toName = $toName;

        return $this;
    }

    /**
     * Get the email of the original forwarded email recipient.
     *
     * @return  string|null
     */ 
    public function getToEmail()
    {
        return $this->toEmail;
    }

    /**
     * Set the email of the original forwarded email recipient.
     *
     * @param  string|null  $toEmail  The email of the original forwarded email recipient.
     *
     * @return  self
     */ 
    public function setToEmail($toEmail)
    {
        $this->toEmail = $toEmail;

        return $this;
    }

    /**
     * Get the subject of the forwarded email.
     *
     * @return  string|null
     */ 
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set the subject of the forwarded email.
     *
     * @param  string|null  $subject  The subject of the forwarded email.
     *
     * @return  self
     */ 
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }
}