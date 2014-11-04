<?php namespace Anomaly\Streams\Addon\FieldType\Datetime;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAddon;

class DatetimeFieldType extends FieldTypeAddon
{

    public $columnType = 'datetime';

    public function onSet($value)
    {
        if (is_numeric($value)) {

            $value = 'Y-m-d H:i:s';
        }

        return $value;
    }

    public function isZeros()
    {
        return (starts_with($this->getValue(), '00'));
    }
}
