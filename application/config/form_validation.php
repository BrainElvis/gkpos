<?php

$config = array(
    'slider' => array(
        array(
            'field' => 'title',
            'label' => 'Slider Title',
            'rules' => 'required'
        )
    ),
    'page' => array(
        array(
            'field' => 'title',
            'label' => 'Page Title',
            'rules' => 'required'
        ),
        array(
            'field' => 'content',
            'label' => 'Page Content',
            'rules' => 'required'
        )
    ),
    'user_type' => array(
        array(
            'field' => 'title',
            'label' => 'User Type Title',
            'rules' => 'required'
        )
    ),
    'customer_registration' => array(
        array(
            'field' => 'CustFirstName',
            'label' => 'Your First Name',
            'rules' => 'required',
            'errors' => array(
                'required' => 'You must provide your first name',
            ),
        ),
        array(
            'field' => 'CustLastName',
            'label' => 'Your Last Name',
            'rules' => 'required',
            'errors' => array(
                'required' => 'You must provide your last name.',
            ),
        ),
        array(
            'field' => 'CustEmail',
            'label' => 'Email Address',
            'rules' => 'required|valid_email|is_unique[customers.CustEmail]',
            'errors' => array(
                'required' => 'You must provide a valid email address.',
                'is_unique' => 'This %s already exists.'
            ),
        ),
        array(
            'field' => 'CustAdd1',
            'label' => 'Customer Address',
            'rules' => 'required'
        ),
        array(
            'field' => 'CustTown',
            'label' => 'Customer Town',
            'rules' => 'required'
        ),
        array(
            'field' => 'CustPostcode',
            'label' => 'Customer Post Code',
            'rules' => 'required'
        ),
        array(
            'field' => 'CustTelephone',
            'label' => 'Customer Phone',
            'rules' => 'required'
        )
    ),
    'gkpos_category' => array(
        array(
            'field' => 'title',
            'label' => 'Category Title',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Category title is required field',
            ),
        ),
        array(
            'field' => 'print_option',
            'label' => 'Printing Options',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Pleae check print options for kitchen printer'
            ),
        ),
    ),
    'gkpos_menu' => array(
        array(
            'field' => 'title',
            'label' => 'Menu Title',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Menu title is required field',
            ),
        )
    ),
    'gkpos_selection' => array(
        array(
            'field' => 'title',
            'label' => 'Menu Selection Title',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Menu Selection title is required field',
            ),
        )
    ),
    'gkpos_delivery' => array(
        array(
            'field' => 'phone',
            'label' => 'Phone',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Please specify a valid phone number'
            ),
        ),
        array(
            'field' => 'name',
            'label' => 'name',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'You must provide customer name with alphabetical characters only',
            ),
        ),
        array(
            'field' => 'street',
            'label' => 'Customer Street',
            'rules' => 'required|trim',
        ),
        array(
            'field' => 'postcode',
            'label' => 'Postal Code',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Please specify a valid Postcode',
            ),
        ),
        array(
            'field' => 'delivery_time',
            'label' => 'Delivery Time',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Order delivery Time is a required field',
            ),
        )
    ),
    'gkpos_collection' => array(
        array(
            'field' => 'phone',
            'label' => 'Phone',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Please specify a valid phone number'
            ),
        ),
        array(
            'field' => 'name',
            'label' => 'name',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'You must provide customer name with alphabetical characters only',
            ),
        )
    ),
    'gkpos_waiting' => array(
        array(
            'field' => 'phone',
            'label' => 'Phone',
            'rules' => 'trim',
        ),
        array(
            'field' => 'name',
            'label' => 'name',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'You must provide customer name with alphabetical characters only',
            ),
        )
    ),
    'gkpos_table' => array(
        array(
            'field' => 'table_number',
            'label' => 'Table Number',
            'rules' => 'required|trim|integer',
            'errors' => array(
                'required' => 'Please specify table number with integer value only',
            ),
        ),
        array(
            'field' => 'guest_quantity',
            'label' => 'Guest Quantity',
            'rules' => 'required|trim|integer',
            'errors' => array(
                'required' => 'Please specify table guest quantity with integer value only',
            ),
        )
    )
);
