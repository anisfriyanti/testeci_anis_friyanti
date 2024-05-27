<?php

namespace App\Http\Controllers;

use App\Models\Formatresponse;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class LevelController extends Controller
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
        $push = Level::all();
        $output = Formatresponse::paginate($push, $paginate['perPage'], $paginate['page'], $paginate['url'], $code, 'ok');
        return $output;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           
            'nama_level' => 'required',
            

        ]);
        if ($validator->fails()) {
            return Formatresponse::buildFailedValidationResponse($validator->messages());
        } else {

            // return Formatresponse::successfullResponse(null);
            $insert = [
               
                'nama_level' => $request->post('nama_level'),
               
            ];

            $post = Level::create($insert);
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
       $data=Level::where('id_level',$id)->first();
       return Formatresponse::successfullResponse($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        
            'nama_level' => 'required',
         


        ]);
        if ($validator->fails()) {
            return Formatresponse::buildFailedValidationResponse($validator->messages());
        } else {



            $post = Level::where('id_level', $id)
                ->update([
                    'nama_level'=> $request->nama_level,
                    

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
        $delete = Level::where('id_level', $id);
        $delete->delete();
        return Formatresponse::successResponse();

    }
}
