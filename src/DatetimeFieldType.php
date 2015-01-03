<?php namespace Anomaly\DatetimeFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\Contract\DateFieldTypeInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class DatetimeFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\FieldType\Datetime
 */
class DatetimeFieldType extends FieldType implements DateFieldTypeInterface
{

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'field_type.datetime::input';

    /**
     * Mutate the value being set on the entry. Basically we will
     * mutate this into a timestamp so Eloquent can use it easily.
     *
     * @param $value
     * @return mixed
     */
    /*public function mutate($value)
    {
        $format = $this->pullConfig('php_format', $this->getDefaultPhpFormat());

        $datetime = \DateTime::createFromFormat($value, $format);

        if (!$datetime instanceof \DateTime) {

            return null;
        }

        return $datetime->getTimestamp();
    }*/

    /**
     * Get the view data for the input.
     *
     * @return array
     */
    public function getInputData()
    {
        $data = parent::getInputData();

        // Get plugin options.
        $data['format']   = $this->pullConfig('format', $this->getDefaultFormat());
        $data['step']     = $this->pullConfig('step', 1);
        $data['pickTime'] = $this->getPickTime();

        // Wrap up with some convenient stuff..
        $data['placeholder'] = $this->getPlaceholder($data['format']);

        return $data;
    }


    /**
     * Get the column type based on config mode.
     *
     * @return array|null|string
     */
    public function getColumnType()
    {
        $mode = $this->pullConfig('mode', 'datetime');

        switch ($mode) {

            case 'date':
            case 'datetime':

                return $mode;
                break;

            default:
                return 'datetime';
                break;
        }
    }

    /**
     * Get the default plugin format based on config mode.
     *
     * @return string
     */
    protected function getDefaultFormat()
    {
        $mode = $this->getColumnType(); // Already standardized.

        switch ($mode) {

            case 'date':

                return 'MM/DD/YYYY';
                break;

            case 'datetime':

                return 'MM/DD/YYYY hh:mm A/PM';
                break;

            // Should never get here!
            default:
                return 'MM/DD/YYYY hh:mm A/PM';
                break;
        }
    }

    /**
     * Get the default PHP format based on config mode.
     *
     * @return string
     */
    protected function getDefaultPhpFormat()
    {
        $mode = $this->getColumnType(); // Already standardized.

        switch ($mode) {

            case 'date':

                return 'm/d/Y';
                break;

            case 'datetime':

                return 'm/d/Y h:i A';
                break;

            // Should never get here!
            default:
                return 'm/d/Y h:i A';
                break;
        }
    }

    /**
     * Get the pickTime plugin option based on config mode.
     *
     * @return bool
     */
    protected function getPickTime()
    {
        return str_contains($this->getColumnType(), 'time');
    }
}
