<?php

return [
    'singular' => 'Category',
    'plural' => 'Categories',
    'empty' => 'There are no categories yet.',
    'count' => 'Categories Count.',
    'search' => 'Search',
    'select' => 'Select Category',
    'permission' => 'Manage categories',
    'trashed' => 'Trashed categories',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for category',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new category',
        'show' => 'Show category',
        'edit' => 'Edit category',
        'delete' => 'Delete category',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The category has been created successfully.',
        'updated' => 'The category has been updated successfully.',
        'deleted' => 'The category has been deleted successfully.',
        'restored' => 'The category has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Category name',
        '%name%' => 'Category name',
        'image' => 'Category image',
        'created_at' => 'Created At',
        'deleted_at' => 'Deleted At',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the category?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the category?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to force delete the category?',
            'confirm' => 'Force',
            'cancel' => 'Cancel',
        ],
    ],
];
