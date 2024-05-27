<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Foundation\Bootstrap\HandleExceptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\ResponseInterface;
use Response;
use Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;

class Guzzlemenu extends Model
{
    public static function guzzlePostJsonPayload($url, $payload)
    {
        $baseurl = env('APP_URL_API');
        //$baseurl='facebook.com';

        $client = new Client(['base_uri' => $baseurl]);

       
        try {


            $response = $client->post($url, [
                "headers" => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ],
                "http_errors" => false,
                "body" => $payload
            ]);
            return json_decode($response->getBody()->getContents());




        } catch (RequestException $e) {

            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $body = $response->getBody();
                return json_decode($body);

            } else {
                $output['code'] = 400;
                $output['message'] = 'Bad Request Server';
                $data = response()->json($output, 400);
                return json_decode($data->content());
            }

        } catch (ConnectException $e) {
            Log::Warning('guzzle_connection_timeout', [
                'url' => $baseurl,
                'message' => 'cek hostname or path url'

            ]);

            $output['code'] = 502;
            $output['message'] = 'bad gateway';
            $data = response()->json($output, 502);
            return json_decode($data->content());

        } catch (ClientException $e) {
            // An exception was raised but there is an HTTP response body
            // with the exception (in case of 404 and similar errors)
            // $response = $e->getResponse();
            // $responseBodyAsString = $response->getBody()->getContents();
            // echo $response->getStatusCode() . PHP_EOL;
            // echo $responseBodyAsString;
            dd($e->getResponse()->getBody()->getContents());

        }
    }
    public static function guzzleGetstring($url)
    {
        //$baseurl ="facebook.com";
        $baseurl = env('APP_URL_API');
        $client = new Client(['base_uri' => $baseurl]);


        try {

            $response = $client->get($url, [
                "headers" => [
                    'Authorization' => 'Bearer ' . Session::get('token')
                ]
            ]);
            return json_decode($response->getBody()->getContents());



        } catch (RequestException $e) {

            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $body = $response->getBody();
                return json_decode($body);

            } else {
                $output['code'] = 400;
                $output['message'] = 'Bad Request Server';
                $data = response()->json($output, 400);
                return json_decode($data->content());
            }

        } catch (ConnectException $e) {
            Log::Warning('guzzle_connection_timeout', [
                'url' => $baseurl,
                'message' => 'cek hostname or path url'

            ]);

            $output['code'] = 502;
            $output['message'] = 'bad gateway';


            $data = response()->json($output, 502);
            return json_decode($data->content());


        }
    }
}
