<?php

use Anomaly\DatetimeFieldType\Support\Config\DateFormatHandler;
use Anomaly\DatetimeFieldType\Support\Config\TimeFormatHandler;

return [
    'mode'        => [
        'type'     => 'anomaly.field_type.select',
        'required' => true,
        'config'   => [
            'options' => [
                'datetime' => 'anomaly.field_type.datetime::config.mode.datetime',
                'date'     => 'anomaly.field_type.datetime::config.mode.date',
                'time'     => 'anomaly.field_type.datetime::config.mode.time',
            ],
        ],
    ],
    'picker'      => [
        'type' => 'anomaly.field_type.boolean',
    ],
    'date_format' => [
        'type'     => 'anomaly.field_type.select',
        'required' => true,
        'config'   => [
            'handler' => DateFormatHandler::class,
        ],
    ],
    'time_format' => [
        'type'   => 'anomaly.field_type.select',
        'config' => [
            'handler' => TimeFormatHandler::class,
        ],
    ],
    'timezone'    => [
        'type'   => 'anomaly.field_type.select',
        'config' => [
            'mode'    => 'search',
            'handler' => 'timezones',
        ],
    ],
    'step'        => [
        'type'     => 'anomaly.field_type.integer',
        'required' => true,
        'config'   => [
            'min' => 1,
        ],
    ],
];
