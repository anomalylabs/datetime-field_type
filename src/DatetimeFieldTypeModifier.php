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

        if ($value instanceof Carbon) {
            return $value->setTimezone('UTC');
        }

        if (is_int($value)) {
            return (new Carbon())->createFromTimestamp(
                $value,
                array_get($this->fieldType->getConfig(), 'timezone')
            )->setTimezone('UTC');
        }

        if (is_string($value)) {
            return (new Carbon())->createFromTimestamp(
                strtotime($value),
                array_get($this->fieldType->getConfig(), 'timezone')
            )->setTimezone('UTC');
        }

        return $value;
    }

    /**
     * Restore the value.
     *
     * @param $value
     * @return Carbon
     */
    public function restore($value)
    {
        if (!$value = $this->toCarbon($value)) {
            return null;
        }

        if ($this->fieldType->config('mode') !== 'date') {
            $value->setTimezone(array_get($this->fieldType->getConfig(), 'timezone'));
        }

        return $value;
    }

    /**
     * Return a carbon instance
     * based on the value.
     *
     * @param $value
     * @return null|Carbon
     * @throws \Exception
     */
    protected function toCarbon($value)
    {
        if (!$value) {
            return null;
        }

        if ($value instanceof Carbon) {
            return $value;
        }

        if (is_numeric($value)) {
            return (new Carbon())->createFromTimestamp($value);
        }

        return (new Carbon())->createFromFormat($this->fieldType->getStorageFormat(), $value);
    }
}
