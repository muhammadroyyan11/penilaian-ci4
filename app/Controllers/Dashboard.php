<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\DataTables;
use App\Models\UserModel;

class Dashboard extends BaseController
{

    protected $db, $builder;
    public function __construct()
    {
        $model = new UserModel();
        $this->DataTables = new DataTables();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('dashboard/dashboard',$data);
    }
}
