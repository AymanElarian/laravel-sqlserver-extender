<?php

use AymanElarian\Extensions\SqlServer\SqlServerConnection;
use AymanElarian\Extensions\SqlServer\Schema\Builder;
use Stubs\PDOStub;

class SqlServerConnectionTest extends PHPUnit_Framework_TestCase
{
    private $sqlServerConnection;

    protected function setUp()
    {
        $sqlsrvConfig = ['driver' => 'sqlsrv', 'prefix' => 'prefix', 'database' => 'database', 'name' => 'foo'];
        $this->sqlServerConnection = new SqlServerConnection(new PDOStub(), 'database', 'prefix', $sqlsrvConfig);
    }

    public function testGetSchemaBuilder()
    {
        $builder = $this->sqlServerConnection->getSchemaBuilder();

        $this->assertInstanceOf(Builder::class, $builder);
    }
}
