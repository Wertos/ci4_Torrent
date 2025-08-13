<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;

class UserModel extends ShieldUserModel
{
    public $MyallowedFields;

    protected function initialize(): void
    {
        parent::initialize();

        $this->MyallowedFields = [
//            'username',
//		        'status',
//    		    'status_message',
//        		'active',
//        		'last_active',
//            $this->allowedFields,
            'avatar',
            'first_name',
            'last_name',
            'birthdate',
            'email',
        ];
        array_push($this->allowedFields, ...$this->MyallowedFields);
        //var_dump($this->allowedFields); die();
    }
}