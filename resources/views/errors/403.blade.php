@extends('layouts.error',
['title' => '', 'css_files' => [],
'js_files' => []])


@section('error')
    <div>
        <h2>Error 403</h2>
    </div>
    <div>
        <p>No tienes acceso a esta página</p>
    </div>
@endsection

