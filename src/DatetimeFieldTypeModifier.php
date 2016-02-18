<?php namespace Anomaly\DatetimeFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeModifier;
use Carbon\Carbon;
use Illuminate\Contracts\Config\Repository;

/**
 * Class DatetimeFieldTypeModifier
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
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
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * Create a new DatetimeFieldTypeModifier instance.
     *
     * @param Repository        $config
     * @param DatetimeFieldType $fieldType
     */
    public function __construct(Repository $config, DatetimeFieldType $fieldType)
    {
        $this->config    = $config;
        $this->fieldType = $fieldType;
    }

    /**
     * Modify the value.
     *
     * @param $value
     * @return int
     */
    public function modify($value)
    {
        if (!$value = $this->toCarbon($value, array_get($this->fieldType->getConfig(), 'timezone'))) {
            return null;
        }

        if ($this->fieldType->config('mode') !== 'date') {
            $value->setTimezone($this->config->get('app.timezone'));
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
     * @param      $value
     * @param null $timezone
     * @return Carbon|null
     * @throws \Exception
     */
    protected function toCarbon($value, $timezone = null)
    {
        if (!$value) {
            return null;
        }

        if ($value instanceof Carbon) {
            return $value;
        }

        if (is_numeric($value)) {
            return (new Carbon())->createFromTimestamp($value, $timezone);
        }

        if ($timestamp = strtotime($value)) {
            return (new Carbon())->createFromTimestamp($timestamp, $timezone);
        }

        return (new Carbon())->createFromFormat($this->fieldType->getStorageFormat(), $value, $timezone);
    }
}
