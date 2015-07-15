<?php namespace Anomaly\DatetimeFieldType;

use Anomaly\DatetimeFieldType\Support\DatetimeConverter;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Carbon\Carbon;
use Illuminate\Config\Repository;

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
        'timezone'    => 'default',
        'date_format' => 'j F, Y',
        'year_range'  => '-50:+50',
        'time_format' => 'g:i A',
        'step'        => 15
    ];

    /**
     * The configuration repository.
     *
     * @var Repository
     */
    protected $configuration;

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
     * @param Repository        $configuration
     */
    public function __construct(DatetimeConverter $converter, Repository $configuration)
    {
        $this->converter     = $converter;
        $this->configuration = $configuration;
    }

    /**
     * Get the config.
     *
     * @return array
     */
    public function getConfig()
    {
        $config = parent::getConfig();

        // Use the user default / standard timezone.
        if (array_get($config, 'timezone') === 'default') {
            array_set($config, 'timezone', $this->configuration->get('streams::datetime.default_timezone'));
        }

        // Use the user specified timezone.
        if (array_get($config, 'timezone') === 'user') {
            array_set($config, 'timezone', $this->configuration->get('app.timezone'));
        }

        return $config;
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

        // Set amount of inputs to expect.
        switch (array_get($this->getConfig(), 'mode')) {
            case 'datetime':
                $rules[] = 'size:3';
                break;
            case 'time':
                $rules[] = 'size:2';
                break;
            case 'date':
                $rules[] = 'size:1';
                break;
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
            implode(' ', parent::getPostValue($default)),
            $this->configuration->get('app.timezone')
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
            return $date . ' ' . $time . ' e';
        }

        return $mode === 'date' ? $date : $time . ' e';
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
