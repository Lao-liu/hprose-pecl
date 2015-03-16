--TEST--
Test that the Hprose\Writer class works.
--SKIPIF--
<?php if (!extension_loaded("hprose")) print "skip"; ?>
--FILE--
<?php
date_default_timezone_set('Asia/Shanghai');
$bytes = new HproseBytesIO();
$writer = new HproseWriter($bytes, true);
$writer->serialize(0);
$writer->serialize(1);
$writer->serialize(2);
$writer->serialize(3);
$writer->serialize(4);
$writer->serialize(5);
$writer->serialize(6);
$writer->serialize(7);
$writer->serialize(8);
$writer->serialize(9);
$writer->serialize(-2147483648);
$writer->serialize(2147483647);
$writer->serialize(2147483648);
$writer->serialize(3.14159265897932);
$writer->serialize(log(-1));
$writer->serialize(log(0));
$writer->serialize(-log(0));
$writer->serialize(true);
$writer->serialize(false);
$writer->serialize("");
$writer->serialize(null);
$writer->serialize(\DateTime::createFromFormat('YmdHis.u', '20150219143448.123456'));
$writer->serialize(\DateTime::createFromFormat('YmdHis.u', '20150219143448.123456', new \DateTimeZone('UTC')));
echo $bytes . "\r\n";

?>
--EXPECT--
0123456789i-2147483648;i2147483647;l2147483648;d3.14159265897932;NI-I+tfenD20150219T143448.123456;D20150219T143448.123456Z
