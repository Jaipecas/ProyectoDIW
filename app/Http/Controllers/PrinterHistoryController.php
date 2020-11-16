<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class PrinterHistoryController extends Controller
{
    // gestiona la renderización de las páginas sobre la imprenta
    public function index(Request $request) {

        $uri = $request->path();

        $data = InfoController::generateGeneralInfo();

        switch ($uri) {
            case "/":
                $layout = "prn_index";
                break;
            case "gutenberg":
                $layout = "prn_extra0";
                break;
            case "difusion-imprenta":
                $layout = "prn_extra1";
                break;
            case "trabajos-imprenta":
                $layout = "prn_extra2";
                break;
            case "primeros-libros":
                $layout = "prn_extra3";
                break;
            case "imprenta-valenciana":
                $layout = "prn_extra4";
                break;
            case "curiosidades":
                $layout = "prn_extra5";
                break;
            case "info-extra":
                $layout = "prn_extra6";
                break;
            case "imprenta-en-espana":
                $layout = "prn_extra7";
                break;
        }
            
        return view($layout, $data);
    }


    
}
