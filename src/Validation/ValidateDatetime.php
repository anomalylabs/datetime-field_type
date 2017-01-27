<?php namespace Anomaly\DatetimeFieldType\Validation;

use Anomaly\DatetimeFieldType\DatetimeFieldType;
use Carbon\Carbon;

/**
 * Class ValidateDatetime
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ValidateDatetime
{

    /**
     * Handle the validation.
     *
     * @param DatetimeFieldType $fieldType
     * @param                   $value
     * @return bool
     */
    public function handle(DatetimeFieldType $fieldType, $value)
    {
        try {
            (new Carbon())->createFromFormat($fieldType->getDatetimeFormat(), $value);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}
