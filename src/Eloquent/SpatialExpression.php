<?php

namespace AymanElarian\Extensions\SqlServer\Eloquent;

use Illuminate\Database\Query\Expression;

class SpatialExpression extends Expression {

    public function getValue() {
        return 'GEOGRAPHY::STGeomFromText(?, 4326)';
    }

    public function getSpatialValue() {
        return $this->value->toWkt();
    }

}
