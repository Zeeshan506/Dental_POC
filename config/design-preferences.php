<?php

return [
    'defaults' => [
        'palette' => 'warm-stone',
        'typeface' => 'source-work',
    ],

    'palettes' => [
        'warm-stone' => [
            'label' => 'Warm Stone',
            'tokens' => [
                'background' => '#fbfaf8', 'surface' => '#f5f2eb', 'elevated' => '#ebe5d8', 'border' => '#ded4c0',
                'primary_text' => '#1a1c1e', 'secondary_text' => '#6b5740', 'muted_text' => '#806c54',
                'primary' => '#1a1c1e', 'primary_hover' => '#2a2d30', 'secondary' => '#6f8272', 'soft' => '#ccbca2',
                'warm' => '#c59b27', 'accent_soft' => '#ebe5d8',
            ],
        ],
        'porcelain-teal' => [
            'label' => 'Porcelain + Deep Teal',
            'tokens' => [
                'background' => '#F7F8F5', 'surface' => '#EEF2EF', 'elevated' => '#E4EBE7', 'border' => '#D1DBD6',
                'primary_text' => '#17201F', 'secondary_text' => '#5F6C67', 'muted_text' => '#82908A',
                'primary' => '#254E4A', 'primary_hover' => '#1C3E3B', 'secondary' => '#78978D', 'soft' => '#B8C9C2',
                'warm' => '#B98252', 'accent_soft' => '#E8D8C9',
            ],
        ],
        'ivory-rosewood' => [
            'label' => 'Ivory + Rosewood',
            'tokens' => [
                'background' => '#FBF8F4', 'surface' => '#F3ECE6', 'elevated' => '#EBDED5', 'border' => '#DCCEC4',
                'primary_text' => '#241E1B', 'secondary_text' => '#6F615A', 'muted_text' => '#95877F',
                'primary' => '#704A46', 'primary_hover' => '#593936', 'secondary' => '#A27B70', 'soft' => '#D3B9AC',
                'warm' => '#B69A69', 'accent_soft' => '#EBE0CB',
            ],
        ],
        'mineral-blue' => [
            'label' => 'Mineral Blue + Chalk',
            'tokens' => [
                'background' => '#F8FAFA', 'surface' => '#EEF3F4', 'elevated' => '#E1EAEC', 'border' => '#CDDADC',
                'primary_text' => '#182125', 'secondary_text' => '#5E7077', 'muted_text' => '#82949A',
                'primary' => '#365F69', 'primary_hover' => '#294B53', 'secondary' => '#7899A1', 'soft' => '#BDD0D4',
                'warm' => '#B99B72', 'accent_soft' => '#E8DFD1',
            ],
        ],
    ],

    'typefaces' => [
        'source-work' => ['label' => 'Source Serif 4 + Work Sans', 'serif' => 'Source Serif 4', 'sans' => 'Work Sans'],
        'newsreader-manrope' => ['label' => 'Newsreader + Manrope', 'serif' => 'Newsreader', 'sans' => 'Manrope'],
    ],
];
