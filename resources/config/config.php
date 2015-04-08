<?php

return [
    'mode'        => [
        'type'   => 'anomaly.field_type.select',
        'config' => [
            'options' => [
                'date'     => 'anomaly.field_type.datetime::config.mode.option.date',
                'time'     => 'anomaly.field_type.datetime::config.mode.option.time',
                'datetime' => 'anomaly.field_type.datetime::config.mode.option.datetime'
            ]
        ]
    ],
    'date_format' => [
        'type'   => 'anomaly.field_type.select',
        'config' => [
            'options' => [
                'j F, Y|d MM, yy' => function () {
                    return date('j F, Y');
                }
            ]
        ]
    ],
    'time_format' => [
        'type'   => 'anomaly.field_type.select',
        'config' => [
            'options' => [
                'g:i A' => function () {
                    return date('g:00 A');
                }
            ]
        ]
    ],
    'step'        => [
        'type'   => 'anomaly.field_type.integer',
        'config' => [
            'min' => 1
        ]
    ]
];
