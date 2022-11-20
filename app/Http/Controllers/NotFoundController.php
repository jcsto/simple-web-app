<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotFoundController extends Controller
{
    public function view() {
        return view('404');
    }
}
