<?php namespace Anomaly\DatetimeFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

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
        'time_step'   => 15,
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
     * Get the formats for PHP / plugin.
     *
     * @return array
     */
    public function getFormats()
    {
        $formats = explode('|', $this->config['date_format']);

        $php    = $formats[0];
        $plugin = $formats[1];

        return compact('php', 'plugin');
    }

    /**
     * Get the PHP format.
     *
     * @return string
     */
    public function getFormat()
    {
        return array_get($this->getFormats(), 'php');
    }
}
