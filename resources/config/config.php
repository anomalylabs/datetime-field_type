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
            'handler' => 'timezones',
        ],
    ],
    'step'        => [
        'type'     => 'anomaly.field_type.integer',
        'required' => true,
        'config'   => [
            'default_value' => 15,
            'min'           => 1,
        ],
    ],
    'min'         => [
        'type'   => 'anomaly.field_type.integer',
        'config' => [
            'min' => false,
        ],
    ],
    'max'         => [
        'type'   => 'anomaly.field_type.integer',
        'config' => [
            'min' => false,
        ],
    ],
];
