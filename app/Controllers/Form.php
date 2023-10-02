<?php

namespace App\Controllers;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
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

    public function masuk()
    {
        $file = new \App\Models\FileModel();

        $session = user();

        $sementara = $file->where('category', 'File Sementara')->findAll();

        $data = [
            'title'     => 'Form Pengajuan Cuti',
            'user'      => $session,
            'sementara' => $sementara
        ];

        return view('form_pengajuan/masuk', $data);
    }


    public function skpd()
    {
        $file = new \App\Models\FileModel();

        $session = user();

        $sementara = $file->where('category', 'File Sementara')->findAll();

        $data = [
            'title'     => 'Form Pengajuan Cuti',
            'user'      => $session,
            'sementara' => $sementara
        ];

        return view('form_pengajuan/skpd', $data);
    }

    //action post ajax CUTI FORM
    public function process_cuti()
    {
        if ($this->request->isAJAX()) {
            $post_cuti = new \App\Models\RequestModel();
            $paramsHeader = [
                'user_id'     => $this->request->getPost('user_id'),
                'form_type'   => 'Cuti',
                'created_at'  => date('Y-m-d H:i:s')
            ];
            //insert lalu ambil id dari inputan terbaru untuk table relasi
            $return_id = $post_cuti->insert($paramsHeader);

            $post_detail = new \App\Models\CutiFormModel();
            $paramsDetail = [
                'request_id'    => $return_id,
                'type'          => $this->request->getPost('jenis_cuti'),
                'description'   => $this->request->getPost('reason'),
                'start_date'    => $this->request->getPost('start_date'),
                'end_date'      => $this->request->getPost('end_date')
            ];
            $detail_id = $post_detail->insert($paramsDetail);

            $paramsAttach = [
                'request_id'    => $return_id,
                'file_id'       => $this->request->getPost('file_sementara')
            ];

            $post_attach = new \App\Models\AttachmentModel();
            $post_attach ->insert($paramsDetail);
            $view = [
                'success'   => "data tersebut berhasil ditambahkan",
                'redirect'  => base_url('cuti')
            ];

            echo json_encode($view);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
    }

    //action post ajax SKPD FORM
    public function process_skpd()
    {
        if ($this->request->isAJAX()) {
            $post_cuti = new \App\Models\RequestModel();
            $paramsHeader = [
                'user_id'     => $this->request->getPost('user_id'),
                'form_type'   => 'Cuti',
                'created_at'  => date('Y-m-d H:i:s')
            ];
            //insert lalu ambil id dari inputan terbaru untuk table relasi
            $return_id = $post_cuti->insert($paramsHeader);

            $post_detail = new \App\Models\CutiFormModel();
            $paramsDetail = [
                'request_id'    => $return_id,
                'type'          => $this->request->getPost('jenis_cuti'),
                'description'   => $this->request->getPost('reason'),
                'start_date'    => $this->request->getPost('start_date'),
                'end_date'      => $this->request->getPost('end_date')
            ];
            $detail_id = $post_detail->insert($paramsDetail);

            $post_attach = new \App\Models\AttachmentModel();
            $paramsAttach = [
                'request_id'    => $return_id,
                'file_id'       => $this->request->getPost('file_sementara')
            ];
            $post_attach ->insert($paramsDetail);

            //return ajax coi
            $view = [
                'success'   => "data tersebut berhasil ditambahkan",
                'redirect'  => base_url('cuti')
            ];

            echo json_encode($view);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
    }
}
