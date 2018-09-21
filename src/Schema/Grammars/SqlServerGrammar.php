<?php

namespace AymanElarian\Extensions\SqlServer\Schema\Grammars;

use AymanElarian\Extensions\SqlServer\Schema\Blueprint;
use Illuminate\Database\Schema\Grammars\SqlServerGrammar as IlluminateSqlServerGrammar;
use Illuminate\Support\Fluent;

class SqlServerGrammar extends IlluminateSqlServerGrammar {

    /**
     * Adds a statement to add a geometry column.
     *
     * @param \Illuminate\Support\Fluent $column
     *
     * @return string
     */
    public function typeGeometry(Fluent $column) {
        return 'geography';
    }

    /**
     * Adds a statement to add a point column.
     *
     * @param \Illuminate\Support\Fluent $column
     *
     * @return string
     */
    public function typePoint(Fluent $column) {
        return 'geography';
    }

    /**
     * Adds a statement to add a linestring column.
     *
     * @param \Illuminate\Support\Fluent $column
     *
     * @return string
     */
    public function typeLinestring(Fluent $column) {
        return 'geography';
    }

    /**
     * Adds a statement to add a polygon column.
     *
     * @param \Illuminate\Support\Fluent $column
     *
     * @return string
     */
    public function typePolygon(Fluent $column) {
        return 'geography';
    }

    /**
     * Adds a statement to add a multipoint column.
     *
     * @param \Illuminate\Support\Fluent $column
     *
     * @return string
     */
    public function typeMultipoint(Fluent $column) {
        return 'geography';
    }

    /**
     * Adds a statement to add a multilinestring column.
     *
     * @param \Illuminate\Support\Fluent $column
     *
     * @return string
     */
    public function typeMultilinestring(Fluent $column) {
        return 'geography';
    }

    /**
     * Adds a statement to add a multipolygon column.
     *
     * @param \Illuminate\Support\Fluent $column
     *
     * @return string
     */
    public function typeMultipolygon(Fluent $column) {
        return 'geography';
    }

    /**
     * Adds a statement to add a geometrycollection column.
     *
     * @param \Illuminate\Support\Fluent $column
     *
     * @return string
     */
    public function typeGeometrycollection(Fluent $column) {
        return 'geography';
    }

    /**
     * Compile a spatial index key command.
     *
     * @param \AymanElarian\Extensions\SqlServer\Schema\Blueprint $blueprint
     * @param \Illuminate\Support\Fluent                   $command
     *
     * @return string
     */
    public function compileSpatial(Blueprint $blueprint, Fluent $command) {
        return $this->compileKey($blueprint, $command, 'spatial');
    }

    public function compileGetAllTables() {
        return 'SELECT * FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = \'BASE TABLE\'';
    }

    /**
     * Compile the query to determine if a table exists.
     *
     * @return string
     */
    public function compileTableExists() {
        return "select * from sys.objects inner join sys.schemas on objects.schema_id = schemas.schema_id where objects.type = 'U' and ( schemas.name + '.' + objects.name = ? or objects.name = ? )";
    }

}
