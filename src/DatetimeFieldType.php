<?php namespace Anomaly\Streams\Addon\FieldType\Datetime;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

class DatetimeFieldType extends FieldType
{

    protected $columnType = 'datetime';

    protected function onSet($value)
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
