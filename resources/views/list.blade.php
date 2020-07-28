@extends('adminlte::page')

@section('title', 'Home Page - S. E. Anime')

@section('content_header')
    <h1>Anime List</h1>
@stop

@section('content')
    
    @if (isset($animes))
        <div class="row">
            @foreach ($animes as $item)
                <div class="info-box col-6">
                    <span class="info-box-icon bg-info col-4">
                        <img src="{{$item->image_url}}" alt="Imagem não carregada" srcset="">
                    </span>
                    <div class="info-box-content col-8">
                        <span class="info-box-text">
                            <strong>{{$item->title ?? ''}}</strong> <br>
                            <small>
                                ({{$item->title_english ?? ''}}) 
                                ({{$item->title_japanese ?? ''}})
                            </small>
                        </span>
                        <br>
                        <span class="info-box-number">Score: {{$item->score ?? ''}}, Scored by: {{$item->scored_by ?? ''}}</span>
                        <div class="progress">
                            <div class="progress-bar bg-info" style="width: {{$item->score*10}}%"></div>
                        </div>
                        <span class="col-12">
                            <div style="overflow:scroll;height:120px;width:100%;overflow:auto;border-style: ridge;">
                                <p style="text-align: justify;">{{$item->synopsis}}</p>
                            </div>
                        </span>
                        <br>
                        <a class="btn btn-primary" href="{{route('anime.show', ['id'=>$item->anime_id])}}">More Info <i class="fas fa-arrow-circle-right"></i></a>
                        
                    </div>
                    
                </div>
            @endforeach
        </div>

        
    @else
        Algum erro ocorreu!
    @endif
    

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop