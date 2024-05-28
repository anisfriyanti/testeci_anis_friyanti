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
       
        $a=array();
        $str = "*";
  
        for($i = 1; $i<=$max;$i++){
     
            for($j=0; $j<$i; $j++){
                $str[$j]="*";
               
            }
      
             array_push($a,$str);
            
           
        }
        return Formatresponse::successfullResponse($a);

      
    }
    public function type2($max){
        $a=array();
        $str = "*";
        for($i=1; $i<=$max; $i++) {
            $str="";
            for($j=$max; $j>=$i; $j--)
            {
                $str[$j]="*";
            }
            array_push($a,$str);
            }
    
            return Formatresponse::successfullResponse($a);
     
    }
    public function type3($max){
        $min=$max-1;
        $a=array();
       
        $str=" ";
        for ($i=$max; $i >=1; $i--) {
        
            for($j=$min; $j>$max-$i; $j--) {
              
               "  ";
       
            }
            for($j=$max; $j>=$i;$j--){
           
                $str[$j]="*";
              
            }
            array_push($a,$str);
        }
        return Formatresponse::successfullResponse($a);
}

}
