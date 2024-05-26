<?php

namespace App\Http\Controllers;

use App\Models\Formatresponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CurrencyController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'money' => 'required|numeric'
      
        ]);
        if ($validator->fails()) {
            return Formatresponse::buildFailedValidationResponse($validator->messages());
        } else {
            $money=$request->money;
            $decimal= number_format($money,0);
            $currency= "Rp.";
            $integer= $money;
            $text=$this->terbilang($money)." rupiah";
            $data['currency']=$currency;
            $data['decimal']=$decimal;
            $data['integer']=$integer;
            $data['terbilang']=$text;
            return Formatresponse::successfullResponse($data);

        }
       
    }
    private function desc($money) {
		$money = abs($money);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($money < 12) {
			$temp = " ". $huruf[$money];
		} else if ($money <20) {
			$temp = $this->desc($money - 10). " belas";
		} else if ($money < 100) {
			$temp = $this->desc($money/10)." puluh". $this->desc($money % 10);
		} else if ($money < 200) {
			$temp = " seratus" . $this->desc($money - 100);
		} else if ($money < 1000) {
			$temp = $this->desc($money/100) . " ratus" . $this->desc($money % 100);
		} else if ($money < 2000) {
			$temp = " seribu" . $this->desc($money - 1000);
		} else if ($money < 1000000) {
			$temp = $this->desc($money/1000) . " ribu" . $this->desc($money % 1000);
		} else if ($money < 1000000000) {
			$temp = $this->desc($money/1000000) . " juta" . $this->desc($money % 1000000);
		} else if ($money < 1000000000000) {
			$temp = $this->desc($money/1000000000) . " milyar" . $this->desc(fmod($money,1000000000));
		} else if ($money < 1000000000000000) {
			$temp = $this->desc($money/1000000000000) . " trilyun" . $this->desc(fmod($money,1000000000000));
		}     
		return $temp;
	}
    private function terbilang($money) {
		if($money<0) {
			$result = "minus ". trim($this->desc($money));
		} else {
			$result = trim($this->desc($money));
		}     		
		return $result;
	}
}
