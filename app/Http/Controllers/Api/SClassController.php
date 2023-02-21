<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/* models */
use App\Models\Sclass;

class SClassController extends Controller
{
    /* start all methods */
    /* start get all class method */
    public function Index() {
        $sclass = Sclass::latest() -> get();

        return response() -> json($sclass);
    }
    /* end get all class method */

    /* start store class */
    public function Store(Request $request) {
        /* validation */
        $validateData = $request -> validate([
            'class_name' => 'required|unique:sclasses|max:25',
        ]);

        /* insert data */
        Sclass::insert([
            'class_name' => $request -> class_name,
        ]);

        /* response */
        return response('Student class added successfully.');
    }
    /* end store class */

    /* start get the id of the class to be edited */
    public function Edit($id) {
        $sclass = Sclass::findOrFail($id);

        return response() -> json($sclass);
    }
    /* end get the id of the class to be edited */

    /* start update selected class */
    public function Update(Request $request, $id) {
        /* validation */
        $validateData = $request -> validate([
            'class_name' => 'required|unique:sclasses|max:25',
        ]);

        Sclass::findOrFail($id) -> update([
            'class_name' => $request -> class_name,
        ]);

        return response('Student class updated successfully.');
    }
    /* end update selected class */

    /* start delete selected class */
    public function Delete($id) {
        Sclass::findOrFail($id) -> delete();

        return response('Student class deleted successfully');
    }
    /* end delete selected class */
    /* end all methods */
}
