<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\JurusanModel;

/**
*
*/
class SiswaController extends Controller
{
    /**
    *
    */
    public function getListSiswa($request, $response)
    {
        $siswa['status'] = 200;
        $siswa['message'] = 'Berhasil Mengambil Data Siswa';
        $siswa['data'] = SiswaModel::get();

        return $response->withHeader('content-type', 'application/json')->withJson($siswa, 200);
    }

    public function createSiswa($request, $response)
    {
        $siswa['status'] = 200;
        $siswa['message'] = 'Berhasil Menambah Data Siswa';
        $request = $request->getParsedBody();
        $rules = [
            'required' => [
                ['name'],
                ['prodi_id']
            ],
            'lengthMax' => [
                ['name', 50],
                ['prodi_id', 5]
            ],
        ];

        $this->validator->rules($rules);

        if($this->validator->validate()) {
            $siswa['data'] = new SiswaModel;
            $siswa['data']->name        = $request['name'];
            $siswa['data']->prodi_id    = $request['prodi_id'];
            $siswa['data']->save();

            return $response->withHeader('content-type', 'application/json')->withJson($siswa, 201);
        } else {
            $_SESSION['errors'] = $this->validator->errors();
            $_SESSION['old']    = $request;

            return $response->withHeader('content-type', 'application/json')->withJson($siswa, 400);
        }
    }

    public function editSiswa($request, $response, $args)
    {
        $siswa['status'] = 200;
        $siswa['message'] = 'Berhasil Mengedit Data Siswa';
        $request = $request->getParsedBody();
        $rules = [
            'required' => [
                ['name'],
                ['prodi_id']
            ],
            'lengthMax' => [
                ['name', 50],
                ['prodi_id', 5]
            ],
        ];

        $this->validator->rules($rules);

        if ($this->validator->validate()) {
            $siswa['data'] = SiswaModel::where('id', $args['id'])->first();
            $siswa['data']->name         = $request['name'];
            $siswa['data']->prodi_id     = $request['prodi_id'];
            $siswa['data']->update();

            return $response->withHeader('content-type', 'application/json')->withJson($siswa, 201);
        } else {
            $_SESSION['errors'] = $this->validator->errors();
            $_SESSION['old']    = $request;

            return $response->withHeader('content-type', 'application/json')->withJson($siswa, 400);
        }

    }

    public function softDelete($request, $response, $args)
    {
        $siswa['status'] = 200;
        $siswa['message'] = 'Berhasil Menghapus Data Siswa';
        $siswa['data'] = SiswaModel::find($args['id']);
        $siswa['data']->deleted = 1;
        $siswa['data']->update();

        return $response->withHeader('Content-type', 'application/json')->withJson($siswa, 201);
    }
}
