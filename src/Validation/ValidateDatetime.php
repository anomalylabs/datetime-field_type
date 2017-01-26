<?php namespace Anomaly\DatetimeFieldType\Validation;

use Anomaly\DatetimeFieldType\DatetimeFieldType;

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
     * @param DatetimeFieldType $fieldType
     * @param                   $value
     * @return bool
     */
    public function handle(DatetimeFieldType $fieldType)
    {
        if (!$fieldType->getValidationValue()) {
            return true;
        }

        return (bool)$fieldType->getPostValue();
    }
}
