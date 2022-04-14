@extends('layouts.error',
['title' => 'Info Imprenta', 'css_files' => [],
'js_files' => []])


@section('error')
    <div>
        <h2>Error 401</h2>
    </div>
    <div>
        <p>No está autorizado para ver esta página. Prueba a loguearte</p>
    </div>
@endsection
