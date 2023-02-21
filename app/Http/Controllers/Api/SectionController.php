<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

/* model */
use App\Models\Section;

class SectionController extends Controller
{
    /* start get all section method */
    public function Index() {
        $section = Section::latest() -> get();

        return response() -> json($section);
    }
    /* end get all section method */

    /* start store section */
    public function Store(Request $request) {
        /* validation */
        $validateData = $request -> validate([
            'class_id' => 'required',
            'section_name' => 'required|unique:sections|max:25',
        ]);

        /* insert data */
        Section::insert([
            'class_id' => $request -> class_id,
            'section_name' => $request -> section_name,
            'created_at' => Carbon::now(),
        ]);

        /* response */
        return response('Section added successfully.');
    }
    /* end store section */

    /* start get the id of the section to be edited */
    public function Edit($id) {
        $section = Section::findOrFail($id);

        return response() -> json($section);
    }
    /* end get the id of the section to be edited */

    /* start update selected section */
    public function Update(Request $request, $id) {
        /* validation */
        $validateData = $request -> validate([
            'class_id' => 'required',
            'section_name' => 'required|unique:sections|max:25',
        ]);

        Section::findOrFail($id) -> update([
            'class_id' => $request -> class_id,
            'section_name' => $request -> section_name,
        ]);

        return response('Section updated successfully.');
    }
    /* end update selected section */

    /* start delete selected section */
    public function Delete($id) {
        Section::findOrFail($id) -> delete();

        return response('Section deleted successfully');
    }
    /* end delete selected section */
}
