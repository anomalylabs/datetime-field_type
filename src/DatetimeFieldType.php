<?php namespace Anomaly\Streams\Addon\FieldType\Datetime;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAddon;

class DatetimeFieldType extends FieldTypeAddon
{
    public $columnType = 'datetime';

    public function isZeros()
    {
        return (starts_with($this->getValue(), '00'));
    }
}
