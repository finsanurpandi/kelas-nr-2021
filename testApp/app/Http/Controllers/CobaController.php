<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function coba()
    {
        // $data['nama'] = 'Finsa';
        // $data['alamat'] = 'Cianjur';

        // return view('coba', $data);

        $nama = 'Finsa';
        $alamat = '<h1>Cianjur</h1>';
        $kelas = 'IF';
        $fruits = array(
            'Mangga', 'Sirsak', 'Jambu'
        );

        return view('coba', compact('nama', 'alamat', 'kelas', 'fruits'));
    }
}
