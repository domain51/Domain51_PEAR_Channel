--TEST--
$package->releases always returns the same ReleaseList object
--FILE--
<?php
// BEGIN REMOVE
set_include_path(
    dirname(__FILE__) . '/..' . PATH_SEPARATOR .
    dirname(__FILE__) . '/../../src' . PATH_SEPARATOR .
    get_include_path()
);
// END REMOVE
require '_setup.inc';

$package = new Domain51_PEAR_Channel_Package($config, 'Example_Package');
$releaseList_one = $package->releases;
$releaseList_two = $package->releases;
assert('$releaseList_one === $releaseList_two');

?>
===DONE===
--EXPECT--
===DONE===