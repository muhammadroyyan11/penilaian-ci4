<?php

namespace App\Controllers;

use App\Libraries\DataTables;
use App\Models\UsersModel;
use CodeIgniter\Session\Session;
use \Hermawan\DataTables\DataTable;
use Myth\Auth\Config\Auth as AuthConfig;

class Users extends BaseController
{
    public function __construct()
    {
        $this->DataTables = new DataTables();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Management Users'
        ];
//        var_dump(user());
        return view('user/data' , $data);
    }

    public function data()
    {
        $db = db_connect();
        $builder = $db->table('users')->select('name, email, phone, address,id');

        return DataTable::of($builder)
            ->addNumbering() //it will return data output with numbering on first column
            ->toJson();
    }
}
