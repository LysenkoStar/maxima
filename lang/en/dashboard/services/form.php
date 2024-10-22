<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Form fields
    |--------------------------------------------------------------------------
    */
    'field' => [
        'title'       => 'Title',
        'descr'       => 'Description',
        'short_descr' => 'Short Description',
        'text'        => 'Text',
        'image'       => 'Image',
        'slug'        => 'Slug',
        'status'      => 'Status',
        'active'      => 'Active',
        'inactive'    => 'Inactive',
        'preview'     => 'Preview',

        'show_products_button' => 'Show products button',
        'show_order_button'    => 'Show order button',
    ],

    /*
    |--------------------------------------------------------------------------
    | Form actions
    |--------------------------------------------------------------------------
    */
    'action' => [
        'create_service' => 'Create service',
        'update_service' => 'Update service',
        'delete_service' => 'Delete service',
    ],

    /*
    |--------------------------------------------------------------------------
    | Form buttons
    |--------------------------------------------------------------------------
    */
    'button' => [
        'create'                => 'Create',
        'update'                => 'Update',
        'delete'                => 'Delete',

        'help' => [
            'show_products_button' => 'Show a product button on the services page that leads to products of this category',
            'show_order_button' => 'Show an order button on the services page, when clicked, a form will be displayed to leave a request',
        ]
    ],
];
