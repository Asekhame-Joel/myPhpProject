<?php
use core\Container;

test('it can resolve something out of the container', function () {
//arrange
$container = new Container();

$container->bind('foo', fn() => 'bar');

//act
$result = $container->resolve('foo');

//asser/expect
expect($result)->toEqual('ndjnsjn');
});
