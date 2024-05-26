<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formatresponse extends Model
{

    protected function buildFailedValidationResponse( $errors) {
        return ["code"=> 406 , "message" => "forbidden" , "errors" =>$errors];
      }
      protected function successfullResponse($data) {
        return ["code"=> 200 , "message" => "data berhasil" , "data" =>$data];
      }
}
