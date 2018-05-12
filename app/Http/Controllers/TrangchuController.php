<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrangchuController extends Controller
{
    public function trangchuadmin()
    {
        return view('admin.trangchu.indext');

    }
}
