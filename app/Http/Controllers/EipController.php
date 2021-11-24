<?php

namespace App\Http\Controllers;

use App\Models\Eip;
use Illuminate\Http\Request;

class EipController extends Controller
{
    public function index(){
        $count = Eip::count();
        return view('EIP.index',compact('count'));
    }

    public function create(){
        return view('EIP.create');
    }
}
