--TEST--
If you call reverse(), the contents of ReleaseList will be reversed
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
$releases = new Domain51_PEAR_Channel_ReleaseList($config, $package);
$releases->filter('latest');
assert('$releases->count() == 2');

$versions = array();
foreach ($releases as $release) {
    $versions[] = $release->version;
}

$versions = array_reverse($versions);
reset($versions);
$releases->reverse();
foreach ($releases as $key => $release) {
    assert('current($versions) == $release->version');
    next($versions);
}

?>
===DONE===
--EXPECT--
===DONE===