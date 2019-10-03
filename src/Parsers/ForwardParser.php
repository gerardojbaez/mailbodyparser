<?php

namespace Gerardojbaez\MailBodyParser\Parsers;

use Gerardojbaez\MailBodyParser\Forward;

class ForwardParser
{
    protected $fromRegex = '/^(?:>\s)?(?:From|De):\s+["\']?(.*?)["\']?\s*(?:\[mailto:|<)?([^<>]*)(?:[\]>])?(?:\\\r)?$/i';
    protected $toRegex = '/^(?:>\s)?(?:To|For|Para|À):\s+["\']?(.*?)["\']?\s*(?:\[mailto:|<)?([^<>]*)(?:[\]>])?(?:\\\r)?$/i';
    protected $subjectRegex= '/^(?:>\s)?(?:Subject|Asunto|Assujettir|Sujet|Exposé):\s([^\\\]*)(?:\\\r)?$/i';

    public function parse($content)
    {
        $forward = new Forward;

        if (empty($content) or ! is_string($content)) {
            return $forward;
        }

        foreach (explode("\n", $content) as $line) {
            $line = trim($line);

            if (empty($line) or
                $this->extractPart('from', $forward, $line) or 
                $this->extractPart('to', $forward, $line) or
                $this->extractSubject($forward, $line)
            ) {
                continue;
            }
        }

        return $forward;
    }

    protected function extractPart($part, &$forward, $line)
    {
        // Convert mailto:jane@example.org into jane@example.org
        if (in_array($part, ['from', 'to'])) {
            $line = str_replace('mailto:', '', $line);
        }

        preg_match($this->{"{$part}Regex"}, $line, $matches);
        
        $part = ucfirst($part);

        if (count($matches) > 2) {
            $forward->{"set{$part}Name"}($matches[1] ?: null);
            $forward->{"set{$part}Email"}($matches[2] ?: null);
        }
    }

    protected function extractSubject($forward, $line)
    {
        preg_match($this->subjectRegex, $line, $matches);

        if (isset($matches[1])) {
            $forward->setSubject($matches[1]);
        }
    }
}