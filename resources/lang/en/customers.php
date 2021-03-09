<?php

return [
    'plural' => 'Customers',
    'singular' => 'Customer',
    'empty' => 'There are no customers',
    'select' => 'Select Customer',
    'permission' => 'Manage Customers',
    'trashed' => 'Trashed Customers',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'list' => 'List Customers',
        'show' => 'Show Customer',
        'create' => 'Create',
        'new' => 'New',
        'edit' => 'Edit Customer',
        'delete' => 'Delete Customer',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The customer has been created successfully.',
        'updated' => 'The customer has been updated successfully.',
        'deleted' => 'The customer has been deleted successfully.',
        'restored' => 'The customer has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Name',
        'phone' => 'Phone',
        'email' => 'Email',
        'created_at' => 'The Date Of Join',
        'old_password' => 'Old Password',
        'password' => 'Password',
        'password_confirmation' => 'Password Confirmation',
        'type' => 'User Type',
        'avatar' => 'Avatar',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the customer ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the customer ?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to force delete the customer ?',
            'confirm' => 'Force',
            'cancel' => 'Cancel',
        ],
    ],
];
