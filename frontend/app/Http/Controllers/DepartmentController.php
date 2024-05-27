<?php

namespace App\Http\Controllers;

use App\Models\Guzzlemenu;
use App\Models\Menuformat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;
class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->get('page');
        $limit = 5;
        $url="department?limit=".$limit."&page=".$page;
        $data =  Guzzlemenu::guzzleGetstring($url);
        // echo json_encode($data);
     
         if (isset($data->code)) {

            if ($data->code === 200 || $data->code=== 404) {
                   return view("department/index",compact('data'));

            }else{
                return redirect('department')->with('message_error', $data->message);
            }
        }
    }
    public function add(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_dept' => 'required',
        ]);
    
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $data = array(

                'nama_dept' => $request->input('nama_dept'),

            );
            $url = 'department';
            $page = 'department';
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
        $url = 'department/' . $request->route("id");
        $result = Guzzlemenu::guzzleDelete($url);
        return json_encode($result);
      

    }

    public function edit(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_dept_show' => 'required',
            'id_dept_show'=>'required'
        ]);
    
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $data = array(

                'nama_dept' => $request->input('nama_dept_show'),
                // 'id_level'=>$request->input('id_level_show')

            );
            $url = 'department/'.$request->input('id_dept_show');
            $page = 'department';
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
