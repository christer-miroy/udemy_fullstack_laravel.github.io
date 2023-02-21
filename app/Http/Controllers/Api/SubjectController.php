<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/* models */
use App\Models\Subject;

class SubjectController extends Controller
{
    /* start display all subjects method */
    public function Index() {
        $subject = Subject::latest() -> get();

        /* response */
        return response() -> json($subject);
    }
    /* end  display all subjects method */

    /* start store subject method */
    public function Store(Request $request) {
        /* validation */
        $validateData = $request -> validate([
            'class_id' => 'required',
            'subject_name' => 'required|unique:subjects|max:25',
            'subject_code' => 'required|unique:subjects|max:25',
        ]);

        /* insert data */
        Subject::insert([
            'class_id' => $request -> class_id,
            'subject_name' => $request -> subject_name,
            'subject_code' => $request -> subject_code,
        ]);

        /* response */
        return response('Subject added successfully.');
    }
    /* end store subject method */

    /* start get the id of the subject to be edited */
    public function Edit($id) {
        $subject = Subject::findOrFail($id);

        return response() -> json($subject);
    }
    /* end get the id of the subject to be edited */

    /* start update selected subject */
    public function Update(Request $request, $id) {
        /* validation */
        $validateData = $request -> validate([
            'class_id' => 'required',
            'subject_name' => 'required|unique:subjects|max:25',
            'subject_code' => 'required|unique:subjects|max:25',
        ]);
        
        Subject::findOrFail($id) -> update([
            'class_id' => $request -> class_id,
            'subject_name' => $request -> subject_name,
            'subject_code' => $request -> subject_code,
        ]);

        return response('Subject updated successfully.');
    }
    /* end update selected subject */

     /* start delete selected subject */
     public function Delete($id) {
        Subject::findOrFail($id) -> delete();

        return response('Subject deleted successfully');
    }
    /* end delete selected subject */
}
