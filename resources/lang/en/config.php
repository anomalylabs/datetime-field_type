<?php

return [
    'mode'        => [
        'label'        => 'Input Mode',
        'instructions' => 'Do you want to display inputs for date, time, or both?',
        'datetime'     => 'Date + Time',
        'date'         => 'Date',
        'time'         => 'Time'
    ],
    'date_format' => [
        'label'        => 'Date Format',
        'instructions' => 'Select the format for the date input.'
    ],
    'time_format' => [
        'label'        => 'Time Format',
        'instructions' => 'Select the format for the time input.'
    ],
    'timezone'    => [
        'label'        => 'Timezone',
        'instructions' => 'Select the timezone for the input.',
        'placeholder'  => 'Default Timezone'
    ],
    'step'        => [
        'label'        => 'Minute Step',
        'instructions' => 'Select the minute step for the time input options.'
    ],
    'min'         => [
        'label'        => 'Minimum Date',
        'instructions' => 'Enter the minimum date allowed in days offset from the date of input.',
        'placeholder'  => '-30'
    ],
    'max'         => [
        'label'        => 'Maximum Date',
        'instructions' => 'Enter the maximum date allowed in days offset from the date of input.',
        'placeholder'  => '45'
    ]
];
