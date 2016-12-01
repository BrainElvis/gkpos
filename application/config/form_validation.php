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
    'gkpos_menu_category' => array(
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
    )
);
