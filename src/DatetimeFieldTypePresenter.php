<?php namespace Anomaly\DatetimeFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Carbon\Carbon;

/**
 * Class DatetimeFieldTypePresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\FieldType\Datetime
 */
class DatetimeFieldTypePresenter extends FieldTypePresenter
{

    /**
     * Return the difference from now or
     * other in human readable format.
     *
     * @return null|string
     */
    public function diffForHumans($other = null)
    {
        $value = $this->resource->getValue();

        if ($value instanceof Carbon) {

            return $value->diffForHumans($other);
        }

        return null;
    }

    /**
     * Return the value and difference from now
     * or other in human readable format.
     *
     * @param null $other
     * @return null|string
     */
    public function valueAndDiffForHumans($other = null)
    {
        $value = $this->resource->getValue();

        if ($value instanceof Carbon) {

            $diff = $value->diffForHumans($other);

            return "{$value} <span class=\"text-muted\">({$diff})</span>";
        }

        return null;
    }
}
 