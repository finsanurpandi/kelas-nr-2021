<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer;

class LecturerController extends Controller
{
    public function index()
    {
        $data['lecturers'] = Lecturer::all();

        // $data['lecturers'] = Lecturer::where('department_id', 1)->first();

        // dd($lecturers);

        // echo "<pre>";
        // print_r($lecturers);
        // echo "</pre>";
        return view('lecturer.index', $data);
    }
}
