<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formatresponse;

use Illuminate\Support\Facades\Validator;

class StarController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|numeric',
            'nominal'=>'required|numeric',
      
        ]);
        if ($validator->fails()) {
            return Formatresponse::buildFailedValidationResponse($validator->messages());
        } else {
            $nominal=$request->nominal;
            $type=$request->type;
           


            switch ($type) {
                case 1:
                    $result=$this->type1($nominal);
                    break;
                case 2:
                    $result=$this->type2($nominal);
                    break;
                case 3:
                    $result=$this->type3($nominal);
                    break;
                default:
                $result=$this->type3($nominal);
            }        
             return $result;
          
           
        }
      
    }
    public function type1($max){
        echo "<html>";
        for($i = 1; $i<=$max;$i++){
            for($j=0; $j<$i; $j++){
                echo "*";
            }
            echo "<br/>";
        }
        echo "</html>";
    }
    public function type2($max){
        echo "<html>";
        for($i=1; $i<=$max; $i++) {
            for($j=$max; $j>=$i; $j--)
            {
            echo '*';
            }
            echo '<br>';
            }
        echo "</html>";
    }
    public function type3($max){
        $min=$max-1;
        for($i=1; $i<=$max; $i++) {
            for($j=$min; $j>=$i; $j--) 
            {
            echo '&nbsp;&nbsp;';
            }
            for($k=1; $k<=$i; $k++)  
            {
            echo '*';
            }
            echo '<br>';
            }
    }

}
