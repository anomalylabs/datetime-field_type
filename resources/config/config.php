<?php

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
            'options' => function (\Illuminate\Contracts\Config\Repository $config) {
                return $config->get('anomaly.field_type.datetime::formats.date');
            },
        ],
    ],
    'time_format' => [
        'type'   => 'anomaly.field_type.select',
        'config' => [
            'options' => function (\Illuminate\Contracts\Config\Repository $config) {
                return $config->get('anomaly.field_type.datetime::formats.time');
            },
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
