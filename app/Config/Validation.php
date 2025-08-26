<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public $registration = [
        'username' => [
            'label' => 'Auth.username',
            'rules' => [
                'required',
                'max_length[30]',
                'min_length[3]',
                'regex_match[/\A[a-zA-Z0-9\.]+\z/u]',
                'is_unique[users.username]',
            ],
        ],
        'first_name' => [
            'label' => 'Profile.firstname',
            'rules' => [
                'max_length[30]',
                'min_length[3]',
                'regex_match[/^[a-zA-Z\p{Cyrillic}]+$/u]',
            ],
        ],

        'last_name' => [
            'label' => 'Profile.lastname',
            'rules' => [
                'max_length[30]',
                'min_length[3]',
                'regex_match[/^[a-zA-Z\p{Cyrillic}]+$/u]',
            ],
        ],

        'birthdate' => [
            'label' => 'Profile.birthdate',
            'rules' => [
                'valid_date',
            ],
        ],
        'avatar' => [],
        'email' => [
            'label' => 'Auth.email',
            'rules' => [
                'required',
                'max_length[254]',
                'valid_email',
                'is_unique[auth_identities.secret]',
            ],
        ],
        'password' => [
            'label' => 'Auth.password',
            'rules' => [
                'required',
                'max_byte[72]',
                'strong_password[]',
            ],
            'errors' => [
                'max_byte' => 'Auth.errorPasswordTooLongBytes',
            ]
        ],
        'password_confirm' => [
            'label' => 'Auth.passwordConfirm',
            'rules' => 'required|matches[password]',
        ],
    ];

//--------------------------------------------------------------------
// Rules For Login
//--------------------------------------------------------------------
public $login = [
/*
     'username' => [
         'label' => 'Auth.username',
         'rules' => [
             'required',
             'max_length[30]',
             'min_length[3]',
             'regex_match[/\A[a-zA-Z0-9\.]+\z/]',
         ],
     ],
*/
    'email' => [
        'label' => 'Auth.email',
        'rules' => [
            'required',
            'max_length[254]',
            'valid_email'
        ],
    ],
    'password' => [
        'label' => 'Auth.password',
            'rules' => [
                'required',
                'max_byte[72]',
            ],
        'errors' => [
            'max_byte' => 'Auth.errorPasswordTooLongBytes',
        ]
    ],
];


}
