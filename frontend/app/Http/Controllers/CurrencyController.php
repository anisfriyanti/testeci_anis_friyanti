<?php

namespace App\Http\Controllers;

use App\Models\Guzzlemenu;
use App\Models\Menuformat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;

class CurrencyController extends Controller
{
    public function index()
    {
        return view("test_2/index");
    }

    public function result(Request $request){
      
        $validator = Validator::make($request->all(), [
            'money' => 'required|numeric',
        ]);
    
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $url = 'currency?money='.$request->input('money');
            $page = 'currency';
            $result =Guzzlemenu::guzzleGetstring($url);
            if (isset($result->code)) {
                if ($result->code === 200) {
                    $data=$result->data;
                    return view("test_2/index", compact('data'));
                }else{
                    return redirect('currency')->with('message_error', $result->message);
                }

            } else {
                

                return redirect('currency')->with('message_error', 'terdapat kesalahan');

            }
        }
    }
}
