--TEST--
Mail_RFC822::parseAddressList does not accept RFC-valid group syntax
--FILE--
<?php
require "Mail/RFC822.php";

$parser = new Mail_RFC822();
var_dump($parser->parseAddressList("empty-group:;","invalid",false,false));

--EXPECT--
array(0) {
} 
