<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home() {
        return view('welcome');
    }

    public function index() {
        return view('welcome');
    }

    public function form() {
        return view('form');
    }

    public function imageGen() {
        return view('imageGen');
    }


}
