<?php

namespace Schema;

use BaseTestCase;
use AymanElarian\Extensions\SqlServer\SqlServerConnection;
use AymanElarian\Extensions\SqlServer\Schema\Blueprint;
use AymanElarian\Extensions\SqlServer\Schema\Builder;
use Mockery;

class BuilderTest extends BaseTestCase
{
    public function testReturnsCorrectBlueprint()
    {
        $connection = Mockery::mock(SqlServerConnection::class);
        $connection->shouldReceive('getSchemaGrammar')->once()->andReturn(null);

        $mock = Mockery::mock(Builder::class, [$connection]);
        $mock->makePartial()->shouldAllowMockingProtectedMethods();
        $blueprint = $mock->createBlueprint('test', function () {
        });

        $this->assertInstanceOf(Blueprint::class, $blueprint);
    }
}
