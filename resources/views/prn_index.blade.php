@extends('layouts.app',
    ['title' => 'Info Imprenta', 'css_files' => ['test_welcome'], 
    'js_files' => []])

@section('content')
    <div class="printer printer2"><a href="./difusion-imprenta">Difusión imprenta</a></div>
    <div class="printer printer3"><a href="./trabajos-imprenta">Trabajos imprenta</a></div>
    <div class="printer printer4"><a href="./primeros-libros">Primeros libros</a></div>
    <div class="printer printer5"><a href="./imprenta-valenciana">Imprenta valenciana</a></div>
    <div class="scrabble"><a href="./scrabble">Scrabble. Info</a></div>
    <div class="login"><a href="./scrabble/login">Login</a></div>
    <div class="register"><a href="./scrabble/register">Registro</a></div>
@endsection