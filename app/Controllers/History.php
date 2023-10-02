<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\UserModel;

class History extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $model = new UserModel();
//        $this->DataTables = new DataTables();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('request');
    }

    public function index()
    {
        $data = [
            'title' => 'Management Users'
        ];
        return view('history/data' , $data);
    }

    public function data()
    {
        $session = user();
        $db = db_connect();
        $builder = $db->table('request as T1')
            ->select('T1.id, T2.name, T1.form_type, T1.created_at, T1.status')
            ->join('users as T2', 'T2.id = T1.user_id')
            ->where('T2.id', $session->id)
            ->orderBy('T1.created_at', 'DESC');

        return DataTable::of($builder)
            ->add('action', function($row){
                return '<a href="'.base_url('user/'.$row->id).'" class="btn btn-secondary"><i class="fa fa-info"></i></a>
                        <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
            }, 'last')
            ->toJson();
    }
}
