<?php

namespace Anomaly\DatetimeFieldType;

use Anomaly\DatetimeFieldType\Support\DatetimeConverter;
use Anomaly\DatetimeFieldType\Validation\ValidateDatetime;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Carbon\Carbon;


/**
 * Class DatetimeFieldType
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
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
     * Validation rules.
     *
     * @var array
     */
    public $rules = [
        'datetime',
    ];

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = null;

    /**
     * The filter view.
     *
     * @var string
     */
    protected $filterView = 'anomaly.field_type.datetime::filter';

    /**
     * The field type validators.
     *
     * @var array
     */
    protected $validators = [
        'datetime' => [
            'handler' => ValidateDatetime::class,
            'message' => 'The date/time format is invalid.',
        ],
    ];

    /**
     * The field type config.
     *
     * @var array
     */
    protected $config = [
        'mode'        => 'datetime',
        'picker'      => true,
        'date_format' => null,
        'time_format' => null,
        'timezone'    => null,
        'step'        => 1,
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
     * Get the input view.
     *
     * @return string
     */
    public function getInputView()
    {
        if ($view = parent::getInputView()) {
            return $view;
        }

        if ($this->isPicker()) {
            return 'anomaly.field_type.datetime::picker';
        }

        return 'anomaly.field_type.datetime::input';
    }

    /**
     * Return if the picker
     * is enabled or not.
     *
     * @return bool
     */
    public function isPicker()
    {
        return array_get($this->getConfig(), 'picker') == true;
    }

    /**
     * Get the config.
     *
     * @return array
     */
    public function getConfig()
    {
        $config = parent::getConfig();

        $timezones = array_map(
            function ($timezone) {
                return strtolower($timezone);
            },
            timezone_identifiers_list()
        );

        $formats = config('datetime.format.date');

        // Check for default / erroneous timezone.
        if ((!$timezone = strtolower(array_get($config, 'timezone'))) || !in_array($timezone, $timezones)) {
            $config['timezone'] = config('app.timezone');
        }

        // Default date format.
        if (!$config['date_format']) {
            $config['date_format'] = config('streams.datetime.date_format');
        }

        // Default time format.
        if (!$config['time_format']) {
            $config['time_format'] = config('streams.datetime.time_format');
        }

        // Make sure format is supported.
        if (!in_array($config['date_format'], array_keys($formats))) {
            $config['date_format'] = array_first(array_keys($formats));
        }

        return $config;
    }

    /**
     * Get the date format
     * for the plugin.
     *
     * @param null $mode
     * @return string
     */
    public function getPluginFormat($mode = null)
    {
        return DatetimeConverter::toJs(
            $this->getDatetimeFormat($mode),
            $this->converterMap()
        );
    }

    /**
     * Get the post format.
     *
     * @param $mode
     * @return string
     */
    public function getDatetimeFormat($mode = null)
    {
        $mode = $mode ?: array_get($this->getConfig(), 'mode');

        $date = array_get($this->getConfig(), 'date_format');
        $time = array_get($this->getConfig(), 'time_format');

        if ($mode === 'datetime') {
            return $date . ' ' . $time;
        }

        return $mode === 'date' ? $date : $time;
    }

    /**
     * Return the conversion map to use.
     *
     * @return string
     */
    public function converterMap()
    {
        return $this->isPicker() ? 'picker' : 'default';
    }

    /**
     * Get the input value.
     *
     * @param null $default
     * @return Carbon
     */
    public function getInputValue($default = null)
    {
        if (!$value = parent::getInputValue($default)) {
            return null;
        }

        $value = (new Carbon())->createFromFormat(
            $this->getInputFormat(),
            $value,
            array_get($this->getConfig(), 'timezone')
        );

        return $value;
    }

    /**
     * Get the input format
     * for the plugin.
     *
     * @return string
     */
    public function getInputFormat()
    {
        return DatetimeConverter::toJs(
            str_replace(':s', '', $this->getStorageFormat()),
            $this->converterMap()
        );
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
     * Get the output format.
     *
     * @param  null $output
     * @return string
     */
    public function getOutputFormat($output = null)
    {
        switch ($output ?: $this->getColumnType()) {
            case 'datetime':
                return array_get(
                    $this->getConfig(),
                    'date_format',
                    config('streams.datetime.date_format')
                ) . ' ' . array_get(
                    $this->getConfig(),
                    'time_format',
                    config('streams.datetime.time_format')
                );
            case 'date':
                return array_get($this->getConfig(), 'date_format', config('streams.datetime.date_format'));
            case 'time':
                return array_get($this->getConfig(), 'time_format', config('streams.datetime.time_format'));
        }

        return null;
    }

    /**
     * Get the placeholder.
     *
     * @return int|null|string
     */
    public function getPlaceholder()
    {
        $placeholder = parent::getPlaceholder();

        if ($placeholder === false) {
            return null;
        }

        if ($placeholder === null) {
            return date($this->getDatetimeFormat());
        }

        return $placeholder;
    }

    /**
     * Get the attributes.
     *
     * @param array $attributes
     * @return array
     */
    public function attributes(array $attributes = [])
    {
        $value = $this->getValue();

        return array_filter(
            array_merge(
                parent::attributes(),
                [
                    'type' => 'text',
                    'data-input-mode' => 'range',
                    'data-datetime-format' => config('streams.datetime.date_format'),

                    'data-step' => $this->config('step'),
                    'data-input-mode' => $this->config('mode'),
                    'data-alt-format' => $this->getPluginFormat(),
                    'data-input-format' => $this->getInputFormat(),
                    'data-value' => $value ? $value->format($this->getInputFormat()) : null,
                    'value' => $value ? $value->format($this->getInputFormat()) : null,
                    'data-locale' => $this->locale ?: config('app.locale'),
                ],
                $this->getAttributes(),
                $attributes
            )
        );
    }
}
