<?php

return [
    'singular' => 'Role',
    'plural' => 'Roles',
    'empty' => 'There are no roles yet.',
    'count' => 'Roles Count.',
    'search' => 'Search',
    'select' => 'Select Role',
    'permission' => 'Manage roles',
    'trashed' => 'Trashed roles',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for role',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new role',
        'show' => 'Show role',
        'edit' => 'Edit role',
        'delete' => 'Delete role',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The role has been created successfully.',
        'updated' => 'The role has been updated successfully.',
        'deleted' => 'The role has been deleted successfully.',
        'restored' => 'The role has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Role name',
        '%name%' => 'Role name',
        'created_at' => 'Created At',
        'deleted_at' => 'Deleted At',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the role?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the role?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to force delete the role?',
            'confirm' => 'Force',
            'cancel' => 'Cancel',
        ],
    ],
];
