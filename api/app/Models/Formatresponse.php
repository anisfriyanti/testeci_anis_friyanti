<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Formatresponse extends Model
{

    protected function buildFailedValidationResponse($errors)
    {
        return ["code" => 406, "message" => "forbidden", "errors" => $errors];
    }
    protected function successfullResponse($data)
    {
        return ["code" => 200, "message" => "data berhasil", "data" => $data];
    }
    protected function createdResponse($data){
        return ["code" => 201, "message" => "data berhasil ditambahkan", "data" => $data];
    }
    protected function failedResponse(){
        return ["code" => 404, "message" => "data gagal"];
    }
    protected function successResponse(){
        return ["code" => 200, "message" => "data berhasil"];
    }
    public static function paginate($items, $perPage, $page, $url, $code, $message)
    {
        $output = collect(['code' => $code, 'message' => $message]);
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect($items);

        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $dataall = array_values($currentPageItems);


        $paginatedItems = new LengthAwarePaginator($dataall, count($itemCollection), $perPage);

        $paginatedItems->setPath($url);


        $data = $output->merge($paginatedItems);

        return $data;
    }
    public static function requestpaginate($request)
    {
        $url = $request->url();
        $page = $request->get('page');
        $perPage = $request->get('limit');
        if (empty($page)) {
            $page = 1;
        }
        if (empty($perPage)) {
            $perPage = 10;
        }
        return array(
            'page' => $page,
            'perPage' => $perPage,
            'url' => $url,
        );


    }
}
