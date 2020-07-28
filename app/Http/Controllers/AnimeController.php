<?php

namespace App\Http\Controllers;

use App\Anime;
use Illuminate\Http\Request;
use Carbon\Carbon; //utilizando a biblioteca Carbon
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;//autenticação

class AnimeController extends Controller
{
    public function index()
    {
        $animes = Anime::all();
        return view('list', compact('animes'));
    }

    public function showfavorites()
    {
        $user = Auth::user();
        if($user == null){
            return redirect('login');
        }else{
            $animes = DB::table('animes')
                ->join('favoritos' ,'animes.anime_id', '=', 'favoritos.anime_id')
                ->where('favoritos.user_id', '=', $user->id)->get();

                return view('favorites', compact('animes'));
        }
    }

    public function storeFavorite($id)
    {
        $user = Auth::user();
        $anime = DB::table('animes')->where('anime_id', '=', $id)->first();
        if($user == null){
            return redirect('login');
        }else{
            if(isset($anime)){
                DB::table('favoritos')->insert([
                    'user_id' => $user->id,
                    'anime_id' => $anime->anime_id,
                ]);
                $animes = DB::table('animes')
                    ->join('favoritos' ,'animes.anime_id', '=', 'favoritos.anime_id')
                    ->where('favoritos.user_id', '=', $user->id)->get();

                return view('favorites', compact('animes'));
            }else{
                return redirect('home');
            }
        }
    }

    public function show($id)
    {
        $anime = DB::table('animes')->where('anime_id', '=', $id)->first();
        return view('info', compact('anime'));
    }

}
