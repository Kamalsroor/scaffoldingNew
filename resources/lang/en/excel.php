<?php

return [
    'actions' => [
        'import' => 'Import Excel',
        'export' => 'Export Excel',
        'example_export' => 'Sample Excel'

    ],
    'messages' => [
        'imported' => 'The :type has been selected successfully.',
        'import_failed' => 'There is a problem importing :type see data',
    ],
    'attributes' => [
        'file' => 'File',
    ],
    'dialogs' => [
        'import' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to Import Excel in the :type ?',
            'confirm' => 'Import',
            'cancel' => 'Cancel',
        ],
    ],
];
