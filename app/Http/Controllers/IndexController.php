<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index(){
        return view('welcome');
    }
    public function country_index($country){
        $data=$country;
        return view('country-page',compact('data'));
    }
    public function saved_page_index(){
        return view('saved-page');
    }
    public function other_page_index(){
        return view('other-feature');
    }
}
