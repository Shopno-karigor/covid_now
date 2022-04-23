<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
    //
    public function index(){
        $curl = curl_init();
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://coronavirus-smartable.p.rapidapi.com/stats/v1/global/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: coronavirus-smartable.p.rapidapi.com",
                "X-RapidAPI-Key: be7452c0a9msh8c4471d25fe51f0p1ff39djsnc154408a5580"
            ],
        ]);

        $response = curl_exec($curl);
        $stats =json_decode($response,true);
        $err = curl_error($curl);
        curl_close($curl);
        return view('welcome',compact('stats'));
    }
    public function country_index($country){
        $curl = curl_init();
        $curl = curl_init();
        if($country=="BD"){
            $url="https://coronavirus-smartable.p.rapidapi.com/stats/v1/BD/";
            $country = "Bangladesh";
        }elseif($country=="US"){
            $url="https://coronavirus-smartable.p.rapidapi.com/stats/v1/US/";
            $country = "United States of America";
        }else{
            $url="https://coronavirus-smartable.p.rapidapi.com/stats/v1/GB/";
            $country = "The United Kingdom";
        }
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: coronavirus-smartable.p.rapidapi.com",
                "X-RapidAPI-Key: be7452c0a9msh8c4471d25fe51f0p1ff39djsnc154408a5580"
            ],
        ]);

        $response = curl_exec($curl);
        $stats =json_decode($response,true);
        $err = curl_error($curl);
        curl_close($curl);
        array_push($stats,$country);
        // $data=DB::table('global_data')->where('Country_code',$country)->orderBy('id', 'DESC')->get();
        // dd($stats['stats']['history']);
        return view('country-page',compact('stats'));
    }
    public function saved_page_index(){
        return view('saved-page');
    }
    public function other_page_index(){
        return view('other-feature');
    }
}
