<?php namespace Anomaly\DatetimeFieldType;

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
        'date_format' => 'j F, Y|d MM, yy',
        'year_range'  => '-50:+50',
        'time_format' => 'g:i A',
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
     * Get the post value.
     *
     * @param null $default
     * @return null|Carbon
     */
    public function getPostValue($default = null)
    {
        if (!$value = array_filter((array)parent::getPostValue($default))) {
            return null;
        }

        if ($this->getColumnType() === 'datetime' && count($value) !== 2) {
            return null;
        }

        return (new Carbon())->createFromFormat(
            $this->getFormat(),
            implode(' ', $value)
        );
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
     * Get the date format for PHP / plugin.
     *
     * @return array
     */
    protected function getDateFormat()
    {
        $formats = explode('|', $this->config['date_format']);

        $php    = $formats[0];
        $plugin = $formats[1];

        return compact('php', 'plugin');
    }

    /**
     * Get the time format for PHP / plugin.
     *
     * @return array
     */
    protected function getTimeFormat()
    {
        $formats = explode('|', $this->config['time_format']);

        $php = $formats[0];
        if (count($formats) > 1) {
            $plugin = $formats[1];
        } else {
            $plugin = $php;
        }

        return compact('php', 'plugin');
    }

    /**
     * Get the PHP date format.
     *
     * @return string
     */
    public function getPhpDateFormat()
    {
        return $this->getDateFormat()['php'];
    }

    /**
     * Get the plugin date format.
     *
     * @return string
     */
    public function getPluginDateFormat()
    {
        return $this->getDateFormat()['plugin'];
    }

    /**
     * Get the PHP time format.
     *
     * @return string
     */
    public function getPhpTimeFormat()
    {
        return $this->getTimeFormat()['php'];
    }

    /**
     * Get the plugin time format.
     *
     * @return string
     */
    public function getPluginTimeFormat()
    {
        return $this->getTimeFormat()['plugin'];
    }

    /**
     * Get the format.
     *
     * @return string
     */
    public function getFormat()
    {
        $format = [];

        $mode = array_get($this->config, 'mode');

        if (in_array($mode, ['date', 'datetime'])) {
            $format[] = $this->getPhpDateFormat();
        }

        if (in_array($mode, ['time', 'datetime'])) {
            $format[] = $this->getPhpTimeFormat();
        }

        return implode(' ', $format);
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
