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
        'instructions' => 'Select the minute interval for time input.'
    ],
    'year_range'  => [
        'label'        => 'Year Range',
        'placeholder'  => '1900:+100',
        'instructions' => 'Select the range of years to display in <strong>min:max</strong> format using year values or +/- year values.',
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
