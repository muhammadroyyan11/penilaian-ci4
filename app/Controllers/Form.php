<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class Form extends BaseController
{
    public function cuti()
    {
        $file = new \App\Models\FileModel();

        $session = user();

        $sementara = $file->where('category', 'File Sementara')->findAll();

        $data = [
            'title'     => 'Form Pengajuan Cuti',
            'user'      => $session,
            'sementara' => $sementara
        ];

        return view('form_pengajuan/cuti', $data);
    }

    public function process_cuti()
    {

    }
}
