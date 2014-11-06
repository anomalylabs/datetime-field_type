<?php namespace Anomaly\Streams\Addon\FieldType\Datetime;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

class DatetimeFieldType extends FieldType
{

    protected $columnType = 'datetime';

    public function isZeros()
    {
        return (starts_with($this->getValue(), '00'));
    }
}
