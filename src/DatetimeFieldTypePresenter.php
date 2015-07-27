<?php namespace Anomaly\DatetimeFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Carbon\Carbon;

/**
 * Class DatetimeFieldTypePresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DatetimeFieldType
 */
class DatetimeFieldTypePresenter extends FieldTypePresenter
{

    /**
     * The datetime field type.
     * This is for IDE hinting.
     *
     * @var DatetimeFieldType
     */
    protected $object;

    /**
     * Format the value.
     *
     * @param null $format
     * @return null|string
     */
    public function format($format = null)
    {
        $value = $this->object->getValue();

        if (!$format) {
            $format = $this->object->getOutputFormat();
        }

        if ($value instanceof Carbon) {
            return $value->format($format);
        }

        return null;
    }

    /**
     * Format the value in user format.
     *
     * @param null $format
     * @return null|string
     */
    public function local($format = null)
    {
        $value = $this->object->getValue();

        if (!$format) {
            $format = $this->object->getOutputFormat();
        }

        if ($value instanceof Carbon) {
            return $value->setTimezone(config('app.timezone'))->format($format);
        }

        return null;
    }

    /**
     * Return the "time ago" formatted string.
     *
     * @return null|string
     */
    public function timeAgo()
    {
        $value = $this->object->getValue();

        if ($value instanceof Carbon) {
            return $value->setTimezone(config('app.timezone'))->diffForHumans();
        }

        return null;
    }
}
