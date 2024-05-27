<?php

namespace App\Http\Controllers;
use App\Models\Guzzlemenu;
use App\Models\Menuformat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;
class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->get('page');
        $limit = 5;
        $url="karyawan?limit=".$limit."&page=".$page;
        $data =  Guzzlemenu::guzzleGetstring($url);
        // echo json_encode($data);
     
         if (isset($data->code)) {

            if ($data->code === 200 || $data->code=== 404) {
                   return view("karyawan/index",compact('data'));

            }else{
                return redirect('karyawan')->with('message_error', $data->message);
            }
        }
    }
    public function add(Request $request){
        $validator = Validator::make($request->all(), [
    
            'nik' => 'required',
            'nama' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'jabatan_select' => 'required',
         

            

        ]);
    
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $data = array(

              
                'nik' => $request->input('nik'),
                'nama' => $request->input('nama'),
                'ttl' => $request->input('ttl'),
                'alamat' => $request->input('alamat'),
                'id_jabatan' => $request->input('jabatan_select'),

            );
            $url = 'karyawan';
            $page = 'karyawan';
            $result = Guzzlemenu::guzzlePostJsonPayload($url, json_encode($data));

       
            if (isset($result->code)) {
                if ($result->code === 201) {
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
        $url = 'karyawan/' . $request->route("id");
        $result = Guzzlemenu::guzzleDelete($url);
        return json_encode($result);
      

    }
    
    public function edit(Request $request){
        $validator = Validator::make($request->all(), [
            'nik_show' => 'required',
            'nama_show' => 'required',
            'ttl_show' => 'required',
            'alamat_show' => 'required',
            'jabatan_select_edit' => 'required',
        ]);
    
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $data = array(

                'nik' => $request->input('nik_show'),
                'nama' => $request->input('nama_show'),
                'ttl' => $request->input('ttl_show'),
                'alamat' => $request->input('alamat_show'),
                'id_jabatan' => $request->input('jabatan_select_edit'),

            );
            $url = 'karyawan/'.$request->input('id_karyawan_show');
            $page = 'karyawan';
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
