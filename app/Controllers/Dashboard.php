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
        $user = new \App\Models\UserModel();
        $request = new \App\Models\RequestModel();
        $data['title'] = 'Dashboard';

        $getUsers = $user->where('pengantar_status', 0)->findAll();
        $getNewReq = $request->select('users.name, request.form_type')
                    ->join('users', 'request.user_id = users.id')
                    ->where('request.status', 'Send')->findAll();

        $data = [
            'title'     => 'Dashboard',
            'users'     => $getUsers,
            'request'   => $getNewReq
        ];
//        var_dump($new);
        return view('dashboard/dashboard',$data);
    }
}
