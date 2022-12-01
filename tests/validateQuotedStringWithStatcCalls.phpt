--TEST--
Mail_RFC822::parseAddressList simple tests with static calls
--SKIPIF--
<?php if (version_compare(PHP_VERSION, '8.0.0', '>=')) die("Skipped: PHP >=8 does not support static calls to non-static methods."); ?>
--FILE--
<?php
require_once 'Mail/RFC822.php';
$address_string = '"Joe Doe \(from Somewhere\)" <doe@example.com>, postmaster@example.com, root';

$address_array = Mail_RFC822::parseAddressList($address_string, "example.com");

foreach ($address_array as $val) {
    echo "mailbox : " . $val->mailbox . "\n";
    echo "host    : " . $val->host . "\n";
    echo "personal: " . $val->personal . "\n";
}
--EXPECTF--
Notice: Calling non-static methods statically is no longer supported since PHP 8 in %sRFC822.php on line %d
mailbox : doe
host    : example.com
personal: "Joe Doe \(from Somewhere\)"
mailbox : postmaster
host    : example.com
personal: 
mailbox : root
host    : example.com
personal: 
