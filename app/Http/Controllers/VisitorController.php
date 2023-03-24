<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use DB;

class VisitorController extends Controller
{
    public function index()
{
    $visitors = Visitor::all();

    return view('visitors.index', [
        'visitors' => $visitors,
    ]);
   // return view('visitors.index', compact('visitors'));
}
}
