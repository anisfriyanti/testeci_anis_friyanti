<?php

namespace App\Http\Controllers;

use App\Models\Formatresponse;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $paginate = Formatresponse::requestpaginate($request);

        $code = 200;
        $push = Karyawan::all();
        $output = Formatresponse::paginate($push, $paginate['perPage'], $paginate['page'], $paginate['url'], $code, 'ok');
        return $output;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|unique:karyawans,nik|numeric|digits_between:1,10',
            'nama' => 'required',
            'ttl' => 'required|date_format:Y-m-d',
            'alamat' => 'required',
            'id_jabatan' => 'required|integer'

        ]);
        if ($validator->fails()) {
            return Formatresponse::buildFailedValidationResponse($validator->messages());
        } else {

            // return Formatresponse::successfullResponse(null);
            $insert = [
                'nik' => $request->post('nik'),
                'nama' => $request->post('nama'),
                'ttl' => $request->post('ttl'),
                'alamat' => $request->post('alamat'),
                'id_jabatan' => $request->post('id_jabatan')
            ];

            $post = Karyawan::create($insert);
            if (!$post) {
                return Formatresponse::failedResponse();
            } else {
                return Formatresponse::createdResponse($post);
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            // 'nik' => 'required|unique:karyawans,nik|numeric|digits_between:1,10',
            'nama' => 'required',
            'ttl' => 'required|date_format:Y-m-d',
            'alamat' => 'required',
            'id_jabatan' => 'required|integer',


        ]);
        if ($validator->fails()) {
            return Formatresponse::buildFailedValidationResponse($validator->messages());
        } else {



            $post = Karyawan::where('id_karyawan', $id)
                ->update([
                    'nik' => $request->nik,
                    'nama' => $request->nama,
                    'ttl' => $request->ttl,
                    'alamat' => $request->alamat,
                    'id_jabatan' => $request->id_jabatan

                ]);


            if (!$post) {
                return Formatresponse::failedResponse();
            } else {
                return Formatresponse::successResponse();
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete =Karyawan::where('id_karyawan', $id);
       

    

            $delete->delete();
        

            return Formatresponse::successResponse();
        
     
    }
}
