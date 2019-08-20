<?php namespace Anomaly\DatetimeFieldType\Validation;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
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
     * @param FormBuilder $builder
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function handle($value)
    {
        if (empty($value)) {
            return true;
        }

        try {
            (new Carbon())->createFromTimestamp(strtotime($value));
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}
