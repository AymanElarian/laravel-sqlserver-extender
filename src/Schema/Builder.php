<?php

namespace AymanElarian\Extensions\SqlServer\Schema;

use Closure;
use Illuminate\Database\Schema\SqlServerBuilder;

class Builder extends SqlServerBuilder
{
    /**
     * Create a new command set with a Closure.
     *
     * @param string  $table
     * @param Closure $callback
     *
     * @return Blueprint
     */
    protected function createBlueprint($table, Closure $callback = null)
    {
        return new Blueprint($table, $callback);
    }
}
