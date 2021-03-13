<?php

return [
    'actions' => [
        'import' => 'استيراد اكسل',
        'export' => 'تصدير اكسل',
        'example_export' => 'مثال اكسل'
    ],
    'messages' => [
        'imported' => 'تم استيراد :type بنجاح',
        'import_failed' => 'هناك مشكله في استيراد :type راجع البيانات',
    ],
    'attributes' => [
        'file' => 'الملف',
    ],
    'dialogs' => [
        'import' => [
            'title' => 'Warning !',
            'info' => 'هل انت متأكد انك تريد استيراد :type ?',
            'confirm' => 'استيراد',
            'cancel' => 'إلغاء',
        ],
    ],
];
