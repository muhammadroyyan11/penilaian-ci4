<?php

namespace App\Controllers;

use App\Libraries\DataTables;
use \Hermawan\DataTables\DataTable;
use App\Models\UserModel;

class Users extends BaseController
{

    protected $db, $builder;
    public function __construct()
    {
        $model = new UserModel();
        $this->DataTables = new DataTables();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
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
        $builder = $db->table('users')->select('id, name, email, phone, address');

        return DataTable::of($builder)
            ->add('action', function($row){
                return '<a href="'.base_url('user/'.$row->id).'" class="btn btn-secondary"><i class="fa fa-info"></i></a>
                        <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
            }, 'last')
            ->toJson();
    }

    public function detail($id){
        $this->builder->select('users.id as userid, username, email, users.name, nip, auth_groups.name as role');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data = [
            'title' => 'Management Users',
            'row'   => $query->getRow()
        ];
        return view('user/detail' , $data);
    }

    public function delete($id)
    {
        $model = new Product_model();
        $model->deleteProduct($id);
        return redirect()->to('/product');
    }
}
