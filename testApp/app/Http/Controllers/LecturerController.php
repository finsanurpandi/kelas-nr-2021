<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer;
use App\Models\Department;
use App\Models\User;
use App\Http\Requests\StoreLecturerRequest;
use App\Http\Requests\UpdateLecturerRequest;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class LecturerController extends Controller
{
    public function index()
    {
        // $data['lecturers'] = Lecturer::all();
        $data['lecturers'] = Lecturer::with('department')->get();
        // $students = Lecturer::find(5925868850)->students;
        // dd($students);

        // $data['lecturers'] = Lecturer::where('department_id', 1)->first();

        // dd($lecturers);

        // echo "<pre>";
        // print_r($lecturers);
        // echo "</pre>";

        $data['user'] = auth()->user(); 
        return view('lecturer.index', $data);
    }

    public function create()
    {
        $data['departments'] = Department::pluck('name', 'id');
        return view('lecturer.create', $data);
    }

    public function store(StoreLecturerRequest $request)
    {
        // $validated = $request->validate([
        //     'nidn' => 'required|digits:10|unique:lecturers,nidn',
        //     'name' => 'required|max:60|min:3|string',
        //     'department_id' => 'required',
        // ]);

        // Lecturer::create($request->all());
        // Lecturer::create($validated);

        Lecturer::create($request->validated());
        
        return redirect()->route('lecturer.index');
    }

    public function edit(string $nidn)
    {
        $data['lecturer'] = Lecturer::find($nidn);
        $data['departments'] = Department::pluck('name', 'id');
        return view('lecturer.create', $data);
    }

    public function update(UpdateLecturerRequest $request, $nidn)
    {
        $lecturer = Lecturer::find($nidn);
        $lecturer->update($request->validated());

        return redirect()->route('lecturer.index');
    }

    public function destroy(string $nidn)
    {
        Lecturer::find($nidn)->delete();

        return redirect()->route('lecturer.index');
    }

    // soft deleting
    public function recycle_bin()
    {
        $data['lecturers'] = Lecturer::onlyTrashed()->get();
        $data['jumlah'] = Lecturer::onlyTrashed()->count();
        return view('lecturer.recyclebin', $data);
    }

    public function restore(Request $request, $nidn)
    {
        Lecturer::onlyTrashed()->where('nidn', $nidn)->restore();

        return redirect()->route('lecturer.recycle.bin');
    }

    public function delete(Request $request, $nidn)
    {
        Lecturer::onlyTrashed()->where('nidn', $nidn)->forceDelete();

        return redirect()->route('lecturer.recycle.bin');
    }

    public function restore_all()
    {
        Lecturer::onlyTrashed()->restore();

        return redirect()->route('lecturer.recycle.bin');
    }

    public function delete_all()
    {
        Lecturer::onlyTrashed()->forceDelete();

        return redirect()->route('lecturer.recycle.bin');
    }

    public function students(string $nidn)
    {
        // $data['students'] = Lecturer::find($nidn)->students()->with('department')->get();   
        $data['students'] = Lecturer::findOrFail($nidn)->students;
        $data['lecturer'] = Lecturer::find($nidn);
        $data['department'] = Department::find(1)->student;
        $data['users'] = User::find(2);

        return view('lecturer.student', $data);
    }

    public function testMail()
    {
        $lecturer = Lecturer::find('368352131');

        $penerima = [
            'penerima1@mail.com',
            'penerima2@mail.com',
            'penerima3@mail.com',
            'penerima4@mail.com',
            'penerima5-mail.com',
        ];

        foreach ($penerima as $pen) {
            Mail::to($pen)->queue(new TestMail($lecturer));    
        }
        
        // method to untuk alamat email penerima
        // method send adalah class mailable nya
    }
}
