
@extends('layouts.error',
['title' => 'Info Imprenta', 'css_files' => [],
'js_files' => []])


@section('error')
    <div>
        <h2>Error 500</h2>
    </div>
    <div>
        <p>Error interno del servidor</p>
    </div>
@endsection