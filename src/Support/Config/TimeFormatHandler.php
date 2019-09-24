<?php namespace Anomaly\DatetimeFieldType\Support\Config;

use Anomaly\SelectFieldType\SelectFieldType;


/**
 * Class TimeFormatHandler
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TimeFormatHandler
{

    /**
     * Handle the options.
     *
     * @param SelectFieldType $fieldType
     * @param Repository $config
     */
    public function handle(SelectFieldType $fieldType, Repository $config)
    {
        $fieldType->setOptions(config('anomaly.field_type.datetime::formats.time'));
    }
}
