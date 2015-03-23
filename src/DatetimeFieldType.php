<?php namespace Anomaly\DatetimeFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class DatetimeFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DatetimeFieldType
 */
class DatetimeFieldType extends FieldType
{

    /**
     * The database column type.
     *
     * @var string
     */
    protected $columnType = 'datetime';

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'anomaly.field_type.datetime::input';

}
