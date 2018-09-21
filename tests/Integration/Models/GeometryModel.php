<?php

use AymanElarian\Extensions\SqlServer\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Model;

class GeometryModel extends Model
{
    use SpatialTrait;

    protected $table = 'geometry';

    protected $spatialFields = ['location', 'line'];
}
