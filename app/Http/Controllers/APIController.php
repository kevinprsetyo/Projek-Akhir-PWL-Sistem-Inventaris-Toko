<?php

namespace App\Http\Controllers;
use App\Barang;
use Illuminate\Http\Request;

class APIController extends Controller
{
    //
     public function apibarang()
    {
        $movies = Barang::orderBy('id','desc')->get();
        return response()->json([
            'succes' => true,
            'message' => 'Berhasil di tampilkan',
            'data'=>$movies
        ],200);
    }
}
