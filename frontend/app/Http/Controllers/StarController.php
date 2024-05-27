<?php

namespace App\Http\Controllers;

use App\Models\Guzzlemenu;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Redirect;
class StarController extends Controller
{
    public function index()
    {
        return view("test_1/index");
    }
    public function result(Request $request){
      
        $validator = Validator::make($request->all(), [
            'type' => 'required|numeric',
            'nominal'=> 'required|numeric'
        ]);
    
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $url = 'star?type='.$request->post('type').'&nominal='.$request->post('nominal');
            $page = 'star';
            $data =Guzzlemenu::guzzleGetstring($url);
          
            return view("test_1/index", compact('data'));
            if (isset($result->code)) {
                if ($result->code === 200) {
                    $data=$result->data;
                    return view("test_1/index", compact('data'));
                }else{
                    return redirect('star')->with('message_error', $result->message);
                }

            } else {
                

                return redirect('star')->with('message_error', 'terdapat kesalahan');

            }
        }
    }
}
