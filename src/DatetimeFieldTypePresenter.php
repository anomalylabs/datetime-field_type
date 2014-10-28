<?php namespace Anomaly\Streams\Addon\FieldType\Datetime;

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
     * The carbon instance loaded with our value.
     *
     * @var \Carbon\Carbon
     */
    protected $carbon;

    /**
     * Create a new DatetimeFieldTypePresenter instance.
     *
     * @param $resource
     */
    public function __construct($resource)
    {
        if ($value = $resource->getValue()) {

            $this->carbon = new Carbon($value);

        }

        parent::__construct($resource);
    }


    /**
     * Return the difference from now in
     * human readable format.
     *
     * @return null|string
     */
    public function diffForHumans($other = null)
    {
        if ($this->carbon instanceof Carbon) {

            return $this->carbon->diffForHumans($other);

        }

        return null;
    }

    public function valueAndDiffForHumans($other = null)
    {
        if ($this->carbon instanceof Carbon) {

            $value = $this->resource->getValue();

            $diff = $this->carbon->diffForHumans($other);

            return "{$value} <span class=\"text-muted\">({$diff})</span>";

        }

        return null;
    }

}
 