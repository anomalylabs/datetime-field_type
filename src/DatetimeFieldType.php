<?php namespace Anomaly\DatetimeFieldType;

use Anomaly\DatetimeFieldType\Support\DatetimeConverter;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Carbon\Carbon;

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
     * The database column type. Depending on the
     * mode this will be datetime, date, or time.
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

    /**
     * The field type config.
     *
     * @var array
     */
    protected $config = [
        'mode'        => 'datetime',
        'date_format' => 'j F, Y',
        'year_range'  => '-50:+50',
        'time_format' => 'h:i A',
        'step'        => 15
    ];

    /**
     * Zero formats.
     *
     * @var array
     */
    protected $zeros = [
        'datetime' => '0000-00-00 00:00:00',
        'date'     => '0000-00-00',
        'time'     => '00:00:00'
    ];

    /**
     * The converter utility.
     *
     * @var DatetimeConverter
     */
    protected $converter;

    /**
     * Create a new DatetimeFieldType instance.
     *
     * @param DatetimeConverter $converter
     */
    public function __construct(DatetimeConverter $converter)
    {
        $this->converter = $converter;
    }

    /**
     * Get the rules.
     *
     * @return array
     */
    public function getRules()
    {
        $rules = parent::getRules();

        // We expect an array.
        $rules[] = 'array';

        // 2 parts for datetime and 1 part for date / time.
        if (array_get($this->getConfig(), 'mode') === 'datetime') {
            $rules[] = 'size:2';
        } else {
            $rules[] = 'size:1';
        }

        return $rules;
    }

    /**
     * Get the post value.
     *
     * @param null $default
     * @return null|Carbon
     */
    public function getPostValue($default = null)
    {
        return (new Carbon())->createFromFormat(
            $this->getPostFormat(),
            implode(' ', parent::getPostValue($default))
        );
    }

    /**
     * Return the validation value.
     *
     * @param null $default
     * @return mixed
     */
    public function getValidationValue($default = null)
    {
        return parent::getPostValue($default);
    }


    /**
     * Get the column type.
     *
     * @return string
     */
    public function getColumnType()
    {
        return array_get($this->config, 'mode');
    }

    /**
     * Get the zero format.
     *
     * @return string
     */
    public function getZero()
    {
        return array_get($this->zeros, $this->getColumnType());
    }

    /**
     * Get the date format
     * for the plugin.
     *
     * @return array
     */
    public function getPluginDateFormat()
    {
        return $this->converter->toJs(array_get($this->getConfig(), 'date_format'));
    }

    /**
     * Get the post format.
     *
     * @return string
     */
    protected function getPostFormat()
    {
        $mode = array_get($this->getConfig(), 'mode');
        $date = array_get($this->getConfig(), 'date_format');
        $time = array_get($this->getConfig(), 'time_format');

        if ($mode === 'datetime') {
            return $date . ' ' . $time;
        }

        return $mode === 'date' ? $date : $time;
    }

    /**
     * Get the storage format.
     *
     * @return string
     * @throws \Exception
     */
    public function getStorageFormat()
    {
        switch ($this->getColumnType()) {
            case 'datetime':
                return 'Y-m-d H:i:s';
            case 'date':
                return 'Y-m-d';
            case 'time':
                return 'H:i:s';
        }

        throw new \Exception('Storage format can not be determined.');
    }
}
