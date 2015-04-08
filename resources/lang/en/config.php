<?php

return [
    'mode'        => [
        'label'        => 'Input Mode',
        'instructions' => 'Do you want to display inputs for date, time, or both?',
        'option'       => [
            'date'     => 'Date',
            'time'     => 'Time',
            'datetime' => 'Date & Time'
        ]
    ],
    'date_format' => [
        'label'        => 'Date Format',
        'instructions' => 'Select the format for the date input.'
    ],
    'time_format' => [
        'label'        => 'Time Format',
        'instructions' => 'Select the format for the time input.'
    ],
    'step'        => [
        'label'        => 'Time Interval',
        'instructions' => 'Select the interval for the time input.'
    ]
];
