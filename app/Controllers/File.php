<?php

namespace App\Controllers;

use App\Libraries\DataTables;
use \Hermawan\DataTables\DataTable;

class File extends BaseController
{
    public function __construct()
    {
        $this->DataTables = new DataTables();
    }

    public function index(): string
    {
        $data = [
            'title' => 'File Manager'
        ];
        return view('file/data', $data);
    }

    public function add(): string
    {
        $data = [
            'title' => 'Add New File'
        ];
        return view('file/add', $data);
    }

    public function process(){
//        print_r($_POST);
//        print_r($_FILES);
        $file = $this->request->getFile('file');
        $fileName = $file->getRandomName();

        $data = [
            'type' => $this->request->getPost('file_type'),
            'patch' => 'uploads/',
            'category' => $this->request->getPost('category'),
            'user_id' => user_id(),
            'files_name' => $fileName
        ];

        $validation = \Config\Services::validation();
        $validation->setRules([
            'image' => 'uploaded[file]|max_size[file,1024]|is_image[file]|mime_in[file,image/jpg,image/png,image/jpeg]',
        ]);
        if (!$validation->withRequest($this->request)->run()){
            return $this->response->setJSON([
                'error' => true,
                'message' => $validation->getErrors()
            ]);
        } else{
            $file->move('uploads/', $fileName);
            $postModel = new \App\Models\FileModel();
            $postModel->save($data);
            return $this->response->setJSON([
                'error' => false,
                'message' => 'success'
            ]);
        }
    }

    //
    public function update($id){
        $old_file = FileModel::find($id);
        $file = $this->request->getFile('file');
        $fileName = $file->getRandomName();

        $data = [
            'type' => $this->request->getPost('file_type'),
            'patch' => 'uploads/',
            'category' => $this->request->getPost('category'),
            'user_id' => user_id(),
            'files_name' => $fileName
        ];

        $validation = \Config\Services::validation();
        $validation->setRules([
            'image' => 'uploaded[file]|max_size[file,1024]|is_image[file]|mime_in[file,image/jpg,image/png,image/jpeg]',
        ]);
        if (!$validation->withRequest($this->request)->run()){
            return $this->response->setJSON([
                'error' => true,
                'message' => $validation->getErrors()
            ]);
        } else{
            $file->move('uploads/', $fileName);
            $postModel = new \App\Models\FileModel();
            $postModel->update($old_file->id ,$data);
            return $this->response->setJSON([
                'error' => false,
                'message' => 'success'
            ]);
        }
    }


    public function data()
    {
        $db = db_connect();
        $builder = $db->table('media as a')
            ->select('a.files_name, a.type, b.name, a.patch, a.id')
            ->join('users as b', 'b.id = a.user_id')
            ->where('b.id', user_id());


        return DataTable::of($builder)
            ->add('action', function ($row) {
                return '<button type="submit" class="btn btn-primary" onclick="alert(\'edit customer: ' . $row->id . '\') ></button>';
            }, 'last')
            ->addNumbering()
            ->toJson();
    }
}
