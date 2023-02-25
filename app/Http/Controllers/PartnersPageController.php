<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartnersPageController extends Controller
{
    public function index(){

        return view("public.partners");
    }
}