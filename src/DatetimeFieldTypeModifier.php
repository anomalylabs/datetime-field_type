<?php namespace Anomaly\DatetimeFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeModifier;
use Carbon\Carbon;
use Illuminate\Config\Repository;

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
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The datetime field type.
     * This is for IDE hinting.
     *
     * @var DatetimeFieldType
     */
    protected $fieldType;

    /**
     * Create a new DatetimeFieldTypeModifier instance.
     *
     * @param FieldType  $fieldType
     * @param Repository $config
     */
    public function __construct(FieldType $fieldType, Repository $config)
    {
        $this->config = $config;

        parent::__construct($fieldType);
    }

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
                $this->config->get('app.timezone')
            )->setTimezone('UTC');
        }

        if (is_string($value)) {
            return (new Carbon())->createFromTimestamp(
                strtotime($value),
                $this->config->get('app.timezone')
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
        if (!$value) {
            return null;
        }

        if ($value instanceof Carbon) {
            return $value->setTimezone($this->config->get('app.timezone'));
        }

        if (is_string($value)) {
            return (new Carbon())->createFromTimestamp(strtotime($value))->setTimezone(
                $this->config->get('app.timezone')
            );
        }

        return (new Carbon())->createFromFormat($this->fieldType->getStorageFormat(), $value)->setTimezone(
            $this->config->get('app.timezone')
        );
    }
}
