<?php

return [
    'mode'        => [
        'type'     => 'anomaly.field_type.select',
        'required' => true,
        'config'   => [
            'options' => [
                'datetime' => 'anomaly.field_type.datetime::config.mode.datetime',
                'date'     => 'anomaly.field_type.datetime::config.mode.date',
                'time'     => 'anomaly.field_type.datetime::config.mode.time'
            ]
        ]
    ],
    'date_format' => [
        'type'     => 'anomaly.field_type.select',
        'required' => true,
        'config'   => [
            'options' => [
                'j F, Y|d MM, yy' => function () {
                    return date('j F, Y');
                }
            ]
        ]
    ],
    'time_format' => [
        'type'     => 'anomaly.field_type.select',
        'required' => true,
        'config'   => [
            'options' => [
                'g:i A' => function () {
                    return date('g:00 A');
                }
            ]
        ]
    ],
    'step'        => [
        'type'     => 'anomaly.field_type.integer',
        'required' => true,
        'config'   => [
            'default_value' => 15,
            'min'           => 1
        ]
    ]
];
