<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; //utilizando a biblioteca Carbon
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;//autenticação

class HomeController extends Controller
{



    //$url = 'https://api.calendario.com.br/?ano='.$ano.'&ibge=2111300&token=bmlsZHNvbmRAZ21haWwuY29tJmhhc2g9MTMyMzQzNTEw';
    //$dado = file_get_contents($url);
    //$xml = simplexml_load_string($dado);

    public function teste(){
        $url = 'https://api.jikan.moe/v3/anime/1';
        $dado = json_decode(file_get_contents($url));
        dd($dado);
        $xml = simplexml_load_string($dado);
        dd($xml);
        //$client = new Client([
        //    'base_uri' => 'http://new-sigws.intranet.uema.br',
        //    'headers' => [
        //        'Content-Type' => 'application/json',
        //        'apptoken' => 'cb30ca57467aa62d600ab5171f4bef93',
        //        'appname' => 'sigws_node'
        //    ]
        //]);
//
        //$response = $client->post('/api/login',
        //    ['body' => json_encode(
        //        [
        //            'login' => '61222785307',
        //            'senha' => ''
        //        ]
        //    )]
        //);
    }
}
