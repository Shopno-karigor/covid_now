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
                "X-RapidAPI-Key: 55dea38588msh3dfc3c0933cf70bp1c6d47jsn5c42aa4709a4"
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
                "X-RapidAPI-Key: 55dea38588msh3dfc3c0933cf70bp1c6d47jsn5c42aa4709a4"
            ],
        ]);
        $response = curl_exec($curl);
        $stats =json_decode($response,true);
        $err = curl_error($curl);
        curl_close($curl);
        array_push($stats,$country);
        // dd($stats['stats']['history']);
        return view('country-page',compact('stats'));
    }
    public function saved_page_index(){
        return view('saved-page');
    }
    public function other_page_index(){
        $curl = curl_init();
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://coronavirus-smartable.p.rapidapi.com/news/v1/global/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: coronavirus-smartable.p.rapidapi.com",
                "X-RapidAPI-Key: 55dea38588msh3dfc3c0933cf70bp1c6d47jsn5c42aa4709a4"
            ],
        ]);

        $response = curl_exec($curl);
        $news =json_decode($response,true);
        $err = curl_error($curl);
        curl_close($curl);
        return view('other-feature',compact('news'));
    }
}
