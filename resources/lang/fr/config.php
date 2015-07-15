<?php

return [
    'mode'        => [
        'label'        => 'Mode d\'entrée',
        'instructions' => 'Voulez-vous afficher une sélection de l\'heure, de la date ou les deux ?'
        'datetime'     => 'Date + Heure',
        'date'         => 'Date',
        'time'         => 'Heure'
    ],
    'date_format' => [
        'label'        => 'Format de la date',
        'instructions' => 'Choisissez le format pour la date.'
    ],
    'time_format' => [
        'label'        => 'Format de l\'heure',
        'instructions' => 'Choisissez le format pour l\'heure.'
    ],
    'step'        => [
        'label'        => 'Ecart des minutes',
        'instructions' => 'Choisissez l\'écart entre les minutes pour la sélection. Ex: 5.'
    ],
    'min'         => [
        'label'        => 'Date minimale',
        'instructions' => 'Entrez la date minimale autorisée en nombre de jour.',
        'placeholder'  => '-30'
    ],
    'max'         => [
        'label'        => 'Date maximale',
        'instructions' => 'Entrez la date maximale autorisée en nombre de jour.',
        'placeholder'  => '45'
    ]
];
