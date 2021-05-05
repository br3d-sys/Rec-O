<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecfacialController extends Controller
{
    public function index(){
        return view('client.recfacial');
    }

    public function reco(Request $request){

        $args = [
            'credentials' => [
                'key' => 'AKIA3JO47CFF734ZV6B7',
                'secret' => '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',
            ],
            'region' => 'us-east-1',
            'version' => 'latest'
        ];
        try {
            $client = new \Aws\Rekognition\RekognitionClient($args);

            $result = $client->compareFaces([
                'SimilarityThreshold' => 90,
                'SourceImage' => [
                    'Bytes' => base64_decode(auth()->user()->image),
                    //'Bytes' => file_get_contents('images/Foto.jpg'),
                ],
                'TargetImage' => [
                    'Bytes' => base64_decode($request->img_bytes),
                    //'Bytes' => file_get_contents('images/Foto.jpg'),
                ],
            ]);

            $array_result = $result->toArray();

            if(count($array_result["FaceMatches"])>0){
                return json_encode(["val"=> $array_result["FaceMatches"][0]["Similarity"],"href"=>"/test"]);
            }else{
                return json_encode(["val"=>"0.00","href"=>"/recfacial"]);
            }
        } catch (\Throwable $th) {
            return json_encode(["val"=>"0.00","href"=>"/recfacial"]);
        }
       
    }

}
