<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller {
    public function index(){
        return view('reports.list');
    }
    public function loanBook(){
        return view('reports.book');
    }

    public function collectionsReport(){
        return view('reports.collections');
    }
    public function dailySales(){
        return view('reports.daily');
    }
    public function monthlySales(){
        return view('reports.monthly');
    }
}
