@extends('adminlte::page')

@section('title', 'Home Page - S. E. Anime')

@section('content_header')
    <h1>
        @if (isset($anime))
            {{$anime->title}}
        @else
            No Anime Found
        @endif
    </h1>
@stop

@section('content')
    
    @if (isset($anime))
        <div class="row">
            <div class="info-box col-12">
                <span class="info-box-icon bg-info col-4">
                    <img src="{{$anime->image_url}}" alt="Imagem não carregada" srcset="">
                </span>
                <div class="big-box bg-info col-8">
                    <div class="inner">
                        <h3>Title English: {{$anime->title_english ?? ''}}</h3>
                        <p>Title Japanese: {{$anime->title_japanese ?? ''}}</p>
                    </div>
                    <div class="inner">
                        <p>Score: {{$anime->score ?? ''}}, Scored by: {{$anime->scored_by ?? ''}}</p>
                    </div>
                    <div class="inner">
                        <p>{{$anime->episodes ?? ''}} episodes</p>
                    </div>
                    <div class="inner">
                        <h3>synopsis</h3>
                        <p style="text-align: justify;">{{$anime->synopsis ?? ''}}</p>
                    </div>
                    <hr>
                    <a href="{{$anime->url  ?? '#'}}" class="small-box-footer">
                        More info in MyAnimeList <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    @if (Auth::user())
                        <br>
                        <a href="{{route('favorited', ['id'=>$anime->anime_id])}}" class="small-box-footer">
                            Add to Favorites <i class="fas fa-heart"></i>
                        </a>
                    @endif
                </div>
                
            </div>
        </div>
    @else
        Check the list
    @endif

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop