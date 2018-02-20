<?php namespace Anomaly\DatetimeFieldType\Validation;

use Anomaly\DatetimeFieldType\DatetimeFieldType;
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
     * @param FormBuilder   $builder
     * @param               $attribute
     * @param               $value
     * @return bool
     */
    public function handle(FormBuilder $builder, $attribute, $value)
    {
        /* @var $fieldType DatetimeFieldType */
        $fieldType = $builder->getFormFieldFromAttribute($attribute);

        try {
            (new Carbon())->createFromFormat($fieldType->getPostFormat(), $value);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}
