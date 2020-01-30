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
            case "difusion_imprenta":
                $layout = "prn_extra1";
                break;
            case "trabajos_imprenta":
                $layout = "prn_extra2";
                break;
            case "primeros_libros":
                $layout = "prn_extra3";
                break;
            case "imprenta_valenciana":
                $layout = "prn_extra4";
                break;
            case "curiosidades":
                $layout = "prn_extra5";
                break;
            case "info_extra":
                $layout = "prn_extra6";
                break;
        }
            
        return view($layout, $data);
    }


    
}
