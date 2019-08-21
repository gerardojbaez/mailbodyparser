# E-Mail Body Parser

## TL;DR

```php
use Gerardojbaez\MailBodyParser\Parsers\ForwardParser;

$forwardParser = new ForwardParser();

/** @var Gerardojbaez\MailBodyParser\Forward $forward **/
$forward = $forwardParser->parse($bodyContent);
$forward->getFromName(); // Jane Doe
$forward->getFromEmail(); // jane@example.org
$forward->getToName(); // Jim Doe
$forward->getToEmail(); // jim@example.org
$forward->getSubject(); // E-mail subject
```