@extends('layouts.app',
['title' => 'Info Imprenta', 'css_files' => [],
'js_files' => []])

@section('styles')
    <link href="{{ asset('css/primerosLibros.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 mt-3">
                <h2>Los primeros libros en España</h2>
                <p>El primer libro impreso en España fue el El sinodal de Aguilafuente en 1472 en
                    Segovia. Por su parte, los tres primeros impresos en València con el procedimiento de
                    Gutenberg fueron:</p>

                <div class="ml-2 mr-1 row bookshelf">
                    <div class="my-1 col-md-3 book-frame" data-toggle="modal" data-target="#book1">
                        <img class="img-fluid book-img " src="../img/12 les trobes.jpg" alt="">
                    </div>
                    <div class="my-1 offset-md-1 col-md-3 book-frame" data-toggle="modal" data-target="#book2">
                        <img class="img-fluid book-img " src="../img/13 el comprensorium-recortada.jpg" alt="">
                    </div>
                    <div class="my-1 offset-md-1  col-md-3 book-frame" data-toggle="modal" data-target="#book3">
                        <img class="img-fluid book-img " src="../img/14 valencian bible.jpg" alt="">
                    </div>
                </div>

                <div class="modal fade" id="book1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Obres o trobes en laors de la Verge Maria
                                    - 1474</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img class="img-fluid img-horizontal" src="../img/12 les trobes.jpg">
                            </div>
                            <div class="modal-footer">
                                <span class="mr-5"><i>Mantener botón izquierdo para ampliar</i></span>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="book2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Comprehensorium - 1475</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img class="img-fluid" src="../img/13 el comprensorium.jpg" alt="">
                            </div>
                            <div class="modal-footer">
                                <span class="mr-5"><i>Mantener botón izquierdo para ampliar</i></span>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="book3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Biblia valenciana - 1478</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img class="img-fluid img-horizontal" src="../img/14 valencian bible.jpg" alt="">
                            </div>
                            <div class="modal-footer">
                                <span class="mr-5"><i>Mantener botón izquierdo para ampliar</i></span>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-3 col-md-12">
                @include('alerts')
                @include('news')
            </div>
        </div>
    </div>
@endsection
