<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
    //
    public function index(){
        return view('welcome');
    }
    public function country_index($country){
        // $data=DB::table('global_data')->where('Country_code',$country)->orderBy('Date_reported', 'DESC')->get();
        $data=DB::table('global_data')->where('Country_code',$country)->orderBy('id', 'DESC')->get();
        // $data=$country;
        return view('country-page',compact('data'));
    }
    public function saved_page_index(){
        return view('saved-page');
    }
    public function other_page_index(){
        return view('other-feature');
    }
}
