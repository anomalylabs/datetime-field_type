<?php namespace Anomaly\DatetimeFieldType\Support;

/**
 * Class DatetimeConverter
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class DatetimeConverter
{

    /**
     * A map of PHP to JS
     * date symbols. Time
     * has no conversion.
     *
     * @var array
     */
    protected $map = [
        // Day
        'd' => 'dd',
        'D' => 'D',
        'j' => 'd',
        'l' => 'DD',
        'z' => 'o',
        // Month
        'F' => 'MM',
        'm' => 'mm',
        'M' => 'M',
        'n' => 'm',
        // Year
        'Y' => 'yy',
        'y' => 'y',
    ];

    /**
     * Return the PHP equivalent
     * of the provided JS date string.
     *
     * @param $js
     * @return string
     */
    public function toPhp($js)
    {
        return $this->convert($js, array_flip($this->map));
    }

    /**
     * Return the JS equivalent
     * of the provided PHP date string.
     *
     * @param $php
     * @return string
     */
    public function toJs($php)
    {
        return $this->convert($php, $this->map);
    }

    /**
     * Convert a string according to a map.
     *
     * @param         $string
     * @param  array  $map
     * @return string
     */
    protected function convert($string, array $map)
    {
        $stack     = '';
        $converted = '';

        /*
         * Add a space at the end so
         * we finish the string.
         */
        $string = str_split($string . ' ');

        for ($i = 0; $i < count($string); $i++) {

            $char = $string[$i];

            // If it's not a valid character we
            // can process the stack.
            if (preg_match('/[^A-Za-z0-9]+/', $char)) {

                $converted .= array_get($map, $stack) . $char;

                $stack = '';

                continue;
            }

            $stack .= $char;
        }

        return trim($converted);
    }
}
