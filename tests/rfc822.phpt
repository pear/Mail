--TEST--
Mail_RFC822: Address Parsing
--FILE--
<?php
require_once 'Mail/RFC822.php';

$parser = &new Mail_RFC822();
 
/* A simple, bare address. */
$address = 'user@example.com';
print_r($parser->parseAddressList($address, null, true, true));

/* Address groups. */
$address = 'My Group: "Richard" <richard@localhost> (A comment), ted@example.com (Ted Bloggs), Barney;';
print_r($parser->parseAddressList($address, null, true, true));

--EXPECT--
Array
(
    [0] => stdClass Object
        (
            [personal] => 
            [comment] => Array
                (
                )

            [mailbox] => user
            [host] => example.com
        )

)
Array
(
    [0] => stdClass Object
        (
            [groupname] => My Group
            [addresses] => Array
                (
                    [0] => stdClass Object
                        (
                            [personal] => "Richard"
                            [comment] => Array
                                (
                                    [0] => A comment
                                )

                            [mailbox] => richard
                            [host] => localhost
                        )

                    [1] => stdClass Object
                        (
                            [personal] => 
                            [comment] => Array
                                (
                                    [0] => Ted Bloggs
                                )

                            [mailbox] => ted
                            [host] => example.com
                        )

                    [2] => stdClass Object
                        (
                            [personal] => 
                            [comment] => Array
                                (
                                )

                            [mailbox] => Barney
                            [host] => localhost
                        )

                )

        )

)
