<?php

return [
    'menu'     => [
        'dashboard'          => 'Dashboard',
        'admin_users'        => 'Admin Users',
        'users'              => 'Users',
        'site-configuration' => 'Site Configuration',
    ],
    'messages' => [
        'general' => [
            'update_success' => 'Successfully updated.',
            'create_success' => 'Successfully created.',
            'delete_success' => 'Successfully deleted.',
        ],
    ],
    'errors'   => [
        'general' => [
            'save_failed' => 'Failed To Save. Please contact with developers',
        ],
    ],
    'pages'    => [
        'common' => [
            'buttons' => [
                'create'          => 'Create New',
                'edit'            => 'Edit',
                'save'            => 'Save',
                'delete'          => 'Delete',
                'cancel'          => 'Cancel',
                'add'             => 'Add',
                'preview'         => 'Preview',
                'forgot_password' => 'Send Me Email!',
                'reset_password'  => 'Reset Password',
            ],
        ],
        'auth'   => [
            'buttons'  => [
                'sign_in'         => 'Sign In',
                'forgot_password' => 'Send Me Email!',
                'reset_password'  => 'Reset Password',
            ],
            'messages' => [
                'remember_me'     => 'Remember Me',
                'please_sign_in'  => 'Sign in to start your session',
                'forgot_password' => 'I forgot my password',
                'reset_password'  => 'Please enter your e-mail address and new password',
            ],
        ],
        'site-configurations'   => [
            'columns'  => [
                'id' => '',
                'locale' => '',
                'name' => '',
                'title' => '',
                'keywords' => '',
                'description' => '',
                'ogp_image_id' => '',
                'twitter_card_image_id' => '',
            ],
        ],
        'files'   => [
            'columns'  => [
                'id' => '',
                'url' => '',
                'title' => '',
                'file_category' => '',
                'file_subcategory' => '',
                's3_key' => '',
                's3_bucket' => '',
                's3_region' => '',
                's3_extension' => '',
                'media_type' => '',
                'content_type' => '',
                'file_size' => '',
                'is_enabled' => '',
            ],
        ],
        'files'   => [
            'columns'  => [
                'id' => '',
                'url' => '',
                'title' => '',
                'file_category' => '',
                'file_subcategory' => '',
                's3_key' => '',
                's3_bucket' => '',
                's3_region' => '',
                's3_extension' => '',
                'media_type' => '',
                'content_type' => '',
                'file_size' => '',
                'is_enabled' => '',
            ],
        ],
        /* NEW PAGE STRINGS */
    ],
    'roles'    => [
        'super_user' => 'Super User',
        'site_admin' => 'Site Administrator',
    ],
];