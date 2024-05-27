<?php

namespace App\Http\Controllers;

use App\Models\Guzzlemenu;
use App\Models\Menuformat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;

class JabatanController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->get('page');
        $limit = 5;
        $url="jabatan?limit=".$limit."&page=".$page;
        $data =  Guzzlemenu::guzzleGetstring($url);
        // echo json_encode($data);
     
         if (isset($data->code)) {

            if ($data->code === 200 || $data->code=== 404) {
                   return view("jabatan/index",compact('data'));

            }else{
                return redirect('jabatan')->with('message_error', $data->message);
            }
        }
    }
    public function add(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_jabatan' => 'required',
            'level_select'=>'required'
        ]);
    
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $data = array(

                'nama_jabatan' => $request->input('nama_jabatan'),
                'id_level'=>$request->input('level_select')

            );
            $url = 'jabatan';
            $page = 'jabatan';
            $result = Guzzlemenu::guzzlePostJsonPayload($url, json_encode($data));
            if (isset($result->code)) {
                if ($result->code === 200) {
                    return redirect($page)->with('message_success', $result->message);
                }else{
                    return redirect($page)->with('message_error', $result->message);
                }

            } else {
                

                return redirect($page)->with('message_error', 'terdapat kesalahan');

            }
        }
    }
    public function delete(Request $request){
        $url = 'jabatan/' . $request->route("id");
        $result = Guzzlemenu::guzzleDelete($url);
        return json_encode($result);
      

    }
    // public function show(Request $request){
    //     $url ='jabatan/'. $request->route("id");
    //     $result = Guzzlemenu::guzzleGetstring($url);
    //     return json_encode($result);
    // }
    public function edit(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_jabatan_show' => 'required',
            'id_jabatan_show'=>'required',
            'level_select_edit'=>'required'
        ]);
    
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $data = array(

                'nama_jabatan' => $request->input('nama_jabatan_show'),
                 'id_level'=>$request->input('level_select_edit')

            );
            $url = 'jabatan/'.$request->input('id_jabatan_show');
            $page = 'jabatan';
            $result = Guzzlemenu::putWithRawBody($url, $data);
            if (isset($result->code)) {
                if ($result->code === 200) {
                    return redirect($page)->with('message_success', $result->message);
                }else{
                    return redirect($page)->with('message_error', $result->message);
                }

            } else {
                

                return redirect($page)->with('message_error', 'terdapat kesalahan');

            }
        }
    }
}
