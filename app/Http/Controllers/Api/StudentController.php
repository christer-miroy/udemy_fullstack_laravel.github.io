<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

/* Hash Password */
use Illuminate\Support\Facades\Hash;

/* model */
use App\Models\Student;

class StudentController extends Controller
{
    /* start get all students method */
    public function Index() {
        $student = Student::latest() -> get();

        return response() -> json($student);
    }
    /* end get all students method */

    /* start store student */
    public function Store(Request $request) {
        /* validation */
        $validateData = $request -> validate([
            'class_id' => 'required',
            'section_id' => 'required',
            'name' => 'required|max:25',
            'email' => 'required|unique:students|max:25',
            'address' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'photo' => 'required',
            'gender' => 'required',
        ]);

        /* insert data */
        Student::insert([
            'class_id' => $request -> class_id,
            'section_id' => $request -> section_id,
            'name' => $request -> name,
            'address' => $request -> address,
            'phone' => $request -> phone,
            'email' => $request -> email,
            'password' => Hash::make($request -> password),
            'photo' => $request -> photo,
            'gender' => $request -> gender,
            'created_at' => Carbon::now(),
        ]);

        return response('Student added successfully.');
    }
    /* end store student */

    /* start get the id of the student to be edited */
    public function Edit($id) {
        $student = Student::findOrFail($id);

        return response() -> json($student);
    }
    /* end get the id of the student to be edited */

    /* start update selected student */
    public function Update(Request $request, $id) {
        /* validation */
        $validateData = $request -> validate([
            'class_id' => 'required',
            'section_id' => 'required',
            'name' => 'required|max:25',
            'email' => 'required|unique:students|max:25',
            'address' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'photo' => 'required',
            'gender' => 'required',
        ]);

        Student::findOrFail($id) -> update([
            'class_id' => $request -> class_id,
            'section_id' => $request -> section_id,
            'name' => $request -> name,
            'address' => $request -> address,
            'phone' => $request -> phone,
            'email' => $request -> email,
            'password' => Hash::make($request -> password),
            'photo' => $request -> photo,
            'gender' => $request -> gender,
        ]);

        return response('Student updated successfully.');
    }
    /* end update selected student */

    /* start delete selected student */
    public function Delete($id) {
        Student::findOrFail($id) -> delete();

        return response('Student deleted successfully');
    }
    /* end delete selected student */
}
