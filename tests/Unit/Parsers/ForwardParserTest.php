<?php

use PHPUnit\Framework\TestCase;
use Gerardojbaez\MailBodyParser\Forward;
use Gerardojbaez\MailBodyParser\Parsers\ForwardParser;

class ForwardParserTest extends TestCase
{
    /** @dataProvider nonForwardValues */
    public function testParseNonForwardValues($content)
    {
        // Arrange
        $parser = new ForwardParser;

        // Act
        $forward = $parser->parse($content);

        // Assert
        $this->assertAllNull($forward);
    }

    /** @dataProvider forwards */
    public function testParseForwards($file, $fromName, $fromEmail, $toName, $toEmail, $subject)
    {
        // Arrange
        $content = file_get_contents(__DIR__."/../../fixtures/{$file}.txt");

        $parser = new ForwardParser;

        // Act
        $forward = $parser->parse($content);

        // Assert
        $this->assertEquals($fromName, $forward->getFromName());
        $this->assertEquals($fromEmail, $forward->getFromEmail());
        $this->assertEquals($toName, $forward->getToName());
        $this->assertEquals($toEmail, $forward->getToEmail());
        $this->assertEquals($subject, $forward->getSubject());
    }
    
    public function nonForwardValues()
    {
        return [
            [null], 
            [''], 
            [123], 
            ['string'],
            [[]]
        ];
    }

    public function forwards()
    {
        return [
            ['plain_gmail_spanish', 'Jane Doe', 'janedoe@gmail.com', '', 'jim@doe.org', 'E-mail subject'],
            ['plain_gmail_spanish_missing_from_name', null, 'janedoe@gmail.com', '', 'jim@doe.org', 'E-mail subject'],
            ['plain_gmail_english', 'Jane Doe', 'janedoe@gmail.com', '', 'jim@doe.org', 'E-mail subject'],
            ['plain_gmail_french', 'Jane Doe', 'janedoe@gmail.com', '', 'jim@doe.org', 'E-mail subject'],
            ['plain_zoho_english', 'Jane Doe', 'janedoe@gmail.com', '', 'jim@doe.org', 'E-mail subject'],
            ['plain_zoho_english_extra_end_spaces', 'Jane Doe', 'janedoe@gmail.com', '', 'jim@doe.org', 'E-mail subject'],
            ['plain_iphone_mail_english', 'Jane Doe', 'janedoe@gmail.com', 'Jim Doe', 'jim@doe.org', '[AcmeLLC] A new public key was added to your account'],
            ['plain_gmail_spanish_extra_end_newlines', 'Jane Doe', 'janedoe@gmail.com', '', 'jim@doe.org', '[AcmeLLC] A new public key was added to your account'],
            ['plain_zoho_english_with_mailto', 'Jane Doe', 'janedoe@gmail.com', '', 'jim@doe.org', 'E-mail subject'],
        ];
    }

    protected function assertAllNull($forward)
    {
        $this->assertInstanceOf(Forward::class, $forward);
        $this->assertNull($forward->getFromName());
        $this->assertNull($forward->getFromEmail());
        $this->assertNull($forward->getToName());
        $this->assertNull($forward->getToEmail());
        $this->assertNull($forward->getSubject());
    }
}