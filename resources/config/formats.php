<?php

return [
    'date' => [
        'l, j F, Y' => function () {
            return date('l, j F, Y'); // Friday, 10 July, 2015
        },
        'j F, Y'    => function () {
            return date('j F, Y'); // 10 July, 2015
        },
        'j M, y'    => function () {
            return date('j M, y'); // 10 Jul, 15
        },
        'm/d/Y'     => function () {
            return date('m/d/Y'); // 07/10/2015
        },
        'Y-m-d'     => function () {
            return date('Y-m-d'); // 2015-07-10
        },
    ],
    'time' => [
        'g:i A' => function () {
            return date('g:00 A'); // 4:00 PM
        },
        'g:i a' => function () {
            return date('g:00 a'); // 4:00 pm
        },
        'H:i'   => function () {
            return date('H:00'); // 16:00
        },
    ],
];
