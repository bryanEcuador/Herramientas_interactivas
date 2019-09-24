<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    //

    public function guardarImagen(Request $request){

        //obtener archivo
        $file = $request->file('imagen');

        //obtenemos la extensión del archivo
        $extension = $file->extension();

        //obtenemos el nombre del archivo
        $caracteres='123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $caracteres = substr(str_shuffle($caracteres),0,10);
        $nombre = rand().$caracteres.date_timestamp_get(date_create()).'.'.$extension;

        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('public')->put($nombre,  \File::get($file));

        return $nombre;

    }
}
