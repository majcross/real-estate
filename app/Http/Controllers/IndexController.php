<?php

namespace App\Http\Controllers;

use inertia;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index(){
        return inertia(
        'Index/Index',
        [
            'message' => 'From Laravel'
        ]
    );

    }

    public function show(){
        return inertia('Index/Show');
    }
}
