<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpeakerController extends Controller
{

    public function list()
    {
        return view('speaker.question_list');
    }

}
