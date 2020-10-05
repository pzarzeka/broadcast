<?php


namespace App\Http\Controllers;


class AdminController
{

    public function list()
    {
        return view('admin.question_list');
    }

}
