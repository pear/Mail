--TEST--
Mail_RFC822::parseAddressList invalid periods in mail address
--FILE--
<?php
require "Mail/RFC822.php";

$parser = new Mail_RFC822();
$result[] = $parser->parseAddressList('.name@example.com');
$result[] = $parser->parseAddressList('name.@example.com');
$result[] = $parser->parseAddressList('name..name@example.com');

foreach ($result as $r) {
    if (is_a($r, 'PEAR_Error')) {
        echo "OK\n";
    }
}
--EXPECT--
OK
OK
OK
