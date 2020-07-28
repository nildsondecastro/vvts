@extends('adminlte::page')

@section('title', 'Home Page - S. E. Anime')

@section('content_header')
    <h1>Welcome to S. E. Anime!</h1>
@stop

@section('content')

    <div>
        <p>Top 10 Animes of the last week</p>
    </div>
    <div class="row">
        <img src="https://cdn.myanimelist.net/images/anime/4/19644.jpg" alt="sem imagem" class="col-xs-2">
        <img src="https://cdn.myanimelist.net/images/anime/10/18793.jpg" alt="sem imagem" class="col-xs-2">
        <img src="https://cdn.myanimelist.net/images/anime/5/17407.jpg" alt="sem imagem" class="col-xs-2">
        <img src="https://cdn.myanimelist.net/images/anime/6/20936.jpg" alt="sem imagem" class="col-xs-2">
        <img src="https://cdn.myanimelist.net/images/anime/4/47487.jpg" alt="sem imagem" class="col-xs-2">
        <img src="https://cdn.myanimelist.net/images/anime/1/139.jpg" alt="sem imagem" class="col-xs-2">
        <img src="https://cdn.myanimelist.net/images/anime/11/29134.jpg" alt="sem imagem" class="col-xs-2">
        <img src="https://cdn.myanimelist.net/images/anime/1589/95329.jpg" alt="sem imagem" class="col-xs-2">
        <img src="https://cdn.myanimelist.net/images/anime/13/65699.jpg" alt="sem imagem" class="col-xs-2">
        <img src="https://cdn.myanimelist.net/images/anime/6/7333.jpg" alt="sem imagem" class="col-xs-2">

    </div>
    

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop