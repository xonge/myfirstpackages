<?php

namespace Xonge\Fenxiao;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FenXiaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $message = 'Hello World';
        return view('FenXiao::welcome', compact('message'));
    }
}
