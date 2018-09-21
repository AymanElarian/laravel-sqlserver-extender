<?php

namespace Eloquent;

use BaseTestCase;
use AymanElarian\Extensions\SqlServer\Eloquent\Builder;
use AymanElarian\Extensions\SqlServer\Eloquent\SpatialExpression;
use AymanElarian\Extensions\SqlServer\Eloquent\SpatialTrait;
use AymanElarian\Extensions\SqlServer\SqlServerConnection;
use AymanElarian\Extensions\SqlServer\Types\LineString;
use AymanElarian\Extensions\SqlServer\Types\Point;
use AymanElarian\Extensions\SqlServer\Types\Polygon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Query\Grammars\SqlServerGrammar;
use Mockery;

class BuilderTest extends BaseTestCase
{
    protected $builder;
    protected $queryBuilder;

    protected function setUp()
    {
        $connection = Mockery::mock(SqlServerConnection::class)->makePartial();
        $grammar = Mockery::mock(SqlServerGrammar::class)->makePartial();
        $this->queryBuilder = Mockery::mock(QueryBuilder::class, [$connection, $grammar]);

        $this->queryBuilder
            ->shouldReceive('from')
            ->once()
            ->andReturn($this->queryBuilder);

        $this->builder = new Builder($this->queryBuilder);
        $this->builder->setModel(new TestBuilderModel());
    }

    public function testUpdatePoint()
    {
        $point = new Point(1, 2);
        $this->queryBuilder
            ->shouldReceive('update')
            ->with(['point' => new SpatialExpression($point)])
            ->once();

        $this->builder->update(['point' => $point]);
    }

    public function testUpdateLinestring()
    {
        $linestring = new LineString([new Point(0, 0), new Point(1, 1), new Point(2, 2)]);

        $this->queryBuilder
            ->shouldReceive('update')
            ->with(['linestring' => new SpatialExpression($linestring)])
            ->once();

        $this->builder->update(['linestring' => $linestring]);
    }

    public function testUpdatePolygon()
    {
        $linestrings[] = new LineString([new Point(0, 0), new Point(0, 1)]);
        $linestrings[] = new LineString([new Point(0, 1), new Point(1, 1)]);
        $linestrings[] = new LineString([new Point(1, 1), new Point(0, 0)]);
        $polygon = new Polygon($linestrings);

        $this->queryBuilder
            ->shouldReceive('update')
            ->with(['polygon' => new SpatialExpression($polygon)])
            ->once();

        $this->builder->update(['polygon' => $polygon]);
    }
}

class TestBuilderModel extends Model
{
    use SpatialTrait;

    public $timestamps = false;
    protected $spatialFields = ['point', 'linestring', 'polygon'];
}
