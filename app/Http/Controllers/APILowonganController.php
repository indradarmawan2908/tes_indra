<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class APILowonganController extends Controller
{
    public function index()
    {
        $data = Lowongan::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Lowongan',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'deskripsi' =>'required',
            'pendidikan' =>'required',
            'tanggal_dibuka'=>'required',
            'tanggal_ditutup'=>'required',
            'kuota'=>'required'
        ],
            [
                'deskripsi.required' => 'Masukkan Deskripsi !',
                'pendidikan.required' => 'Masukkan Pendidikan !',
                'tanggal_dibuka.required' => 'Masukkan Tanggal Dibuka !',
                'tanggal_ditutup.required' => 'Masukkan Tanggal Ditutup !',
                'kuota'.'required' => 'Masukkan Kuota!'
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $data = Lowongan::create([
                'deskripsi'   => $request->input('deskripsi'),
                'pendidikan'   => $request->input('pendidikan'),
                'tanggal_dibuka'   => $request->input('tanggal_dibuka'),
                'tanggal_ditutup'   => $request->input('tanggal_ditutup'),
                'kuota' => $request->input('kuota')

            ]);

            if ($data) {
                return response()->json([
                    'success' => true,
                    'message' => 'Sukses',
                    'data'  => $data
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Disimpan!',
                ], 400);
            }
        }
    }


    public function update(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'deskripsi' =>'required',
            'pendidikan' =>'required',
            'tanggal_dibuka'=>'required',
            'tanggal_ditutup'=>'required',
            'kuota'=>'required'
        ],
            [
                'deskripsi.required' => 'Masukkan Deskripsi !',
                'pendidikan.required' => 'Masukkan Pendidikan !',
                'tanggal_dibuka.required' => 'Masukkan Tanggal Dibuka !',
                'tanggal_ditutup.required' => 'Masukkan Tanggal Ditutup !',
                'kuota'.'required' => 'Masukkan Kuota!'
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $data = Lowongan::whereId($request->input('id'))->update([
                'deskripsi'   => $request->input('deskripsi'),
                'pendidikan'   => $request->input('pendidikan'),
                'tanggal_dibuka'   => $request->input('tanggal_dibuka'),
                'tanggal_ditutup'   => $request->input('tanggal_ditutup'),
                'kuota' => $request->input('kuota')
            ]);


            if ($data) {
                return response()->json([
                    'success' => true,
                    'message' => 'Success !! Data Berhasil Di Update!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Diupdate!',
                ], 500);
            }

        }

    }

    public function destroy($id)
    {
        $data = Lowongan::findOrFail($id);
        $data->delete();

        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Gagal Dihapus!',
            ], 500);
        }

    }
    public function show()
    {

    }
}