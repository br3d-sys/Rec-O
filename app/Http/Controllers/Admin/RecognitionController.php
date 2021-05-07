<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Recognition;
use Illuminate\Http\Request;

class RecognitionController extends Controller
{

   /* public function req03(){
        return view('admin.recognitions.req03');
    }*/

    public function req05(){

        $recognition = Recognition::all();

        return view('admin.recognitions.req05', compact('recognition'));
    }

}
