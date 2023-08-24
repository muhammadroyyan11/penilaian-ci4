<?php

namespace App\Controllers;

use App\Libraries\DataTables;
use App\Models\UsersModel;
use \Hermawan\DataTables\DataTable;

class Users extends BaseController
{
    public function __construct()
    {
        $this->DataTables = new DataTables();
    }

    public function index(): string
    {
        return view('user/data');
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
