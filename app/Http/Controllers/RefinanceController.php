<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RefinanceController extends Controller{
    public function index() {
        return view('refinances.list');
    }
}
