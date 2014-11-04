<?php namespace Anomaly\Streams\Addon\FieldType\Datetime;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAddon;

class DatetimeFieldType extends FieldTypeAddon
{

    public $columnType = 'datetime';

    public function onSet($value)
    {
        if (is_numeric($value)) {

            $value = date('Y-m-d H:i:s', $value);
        }

        return $value;
    }

    public function isZeros()
    {
        return (starts_with($this->getValue(), '00'));
    }
}
