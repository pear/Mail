--TEST--
Mail_RFC822::parseAddressList simple tests
--FILE--
<?php
require_once 'Mail/RFC822.php';
$address_string = '"Joe Doe \(from Somewhere\)" <doe@example.com>, postmaster@example.com, root';

$parser = new Mail_RFC822();
$address_array = $parser->parseAddressList($address_string, "example.com");

foreach ($address_array as $val) {
    echo "mailbox : " . $val->mailbox . "\n";
    echo "host    : " . $val->host . "\n";
    echo "personal: " . $val->personal . "\n";
}
--EXPECT--
mailbox : doe
host    : example.com
personal: "Joe Doe \(from Somewhere\)"
mailbox : postmaster
host    : example.com
personal: 
mailbox : root
host    : example.com
personal: 
