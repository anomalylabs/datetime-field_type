<?php namespace Anomaly\DatetimeFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeModifier;
use Carbon\Carbon;

/**
 * Class DatetimeFieldTypeModifier
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DatetimeFieldType
 */
class DatetimeFieldTypeModifier extends FieldTypeModifier
{

    /**
     * The datetime field type.
     * This is for IDE hinting.
     *
     * @var DatetimeFieldType
     */
    protected $fieldType;

    /**
     * Modify the value.
     *
     * @param $value
     * @return int
     */
    public function modify($value)
    {
        if (!$value) {
            return null;
        }

        return $value;

        $mode = $this->fieldType->getColumnType();

        $date = (new Carbon())->createFromFormat($this->fieldType->getFormat(), implode(' ', (array)$value));

        if ($mode == 'datetime') {
            return $date->toDateTimeString();
        }

        if ($mode == 'date') {
            return $date->toDateString();
        }

        if ($mode == 'time') {
            return $date->toTimeString();
        }

        return null;
    }

    /**
     * Restore the value.
     *
     * @param $value
     * @return Carbon
     */
    public function restore($value)
    {
        if (!$value) {
            return null;
        }

        return (new Carbon())->createFromFormat($this->fieldType->getStorageFormat(), $value);
    }
}
