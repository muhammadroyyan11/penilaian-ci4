<?php

namespace App\Controllers;
use App\Libraries\DataTables;

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

    public function data_sample()
    {
        // sql query
        $query = "SELECT * FROM users";
        // $where  = array('nama_kategori' => 'Tutorial');
        $where  = null; 
        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        $search = array('name','email','username');
        echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
    }
}
