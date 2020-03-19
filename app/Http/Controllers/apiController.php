<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\casos;
use App\Http\Requests;

class apiController extends Controller
{
    public function index(){

        return casos::All();
    }
}
