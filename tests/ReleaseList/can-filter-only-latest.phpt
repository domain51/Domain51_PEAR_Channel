--TEST--
Calling filter('latest') will filter out to only the latest releases of
every state.
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
assert('$package->releases->count() > 2');

$package->releases->filter('latest');
assert('$package->releases->count() == 2');

?>
===DONE===
--EXPECT--
===DONE===