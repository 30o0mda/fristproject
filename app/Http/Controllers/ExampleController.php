<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function my_data()
    {
        return view('my_data');
    }
}
