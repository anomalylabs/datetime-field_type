<?php namespace Anomaly\DatetimeFieldType;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class DatetimeFieldTypeServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DatetimeFieldType
 */
class DatetimeFieldTypeServiceProvider extends AddonServiceProvider
{

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\DatetimeFieldType\DatetimeFieldTypeModifier' => 'Anomaly\DatetimeFieldType\DatetimeFieldTypeModifier'
    ];

}
