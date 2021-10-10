<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department as DepartmentModel;

class Department extends Controller
{
    //

    function view_all (){
        $depts = DepartmentModel::all();
        return $depts->toArray();
    }

    function get ($id){
        $get = DepartmentModel::find($id);

        if($get == null){
            return response()->json(array("detail" => "no department found."), $status_code = 404);
        }

        return $get->toArray();
    }

    function add (Request $request){

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), $status_code = 400);
        }

        $c = DepartmentModel::create($validator->validated());

        return response()->json($c->toArray(), $status_code = 201);
    }

    function edit (Request $request, $id){
        $dept = DepartmentModel::find($id);

        if($dept == null){
            return response()->json(array("error" => "Department not found."), $status_code = 400);
        }
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), $status_code = 400);
        }
        $dept->name = $validator->validated()['name'];
        $dept->save();

        return $dept->toArray();
    }

    function delete ( $id){

        $dept = DepartmentModel::find($id);
        if($dept == null){
            return response()->json(array("error" => "Department not found."), $status_code = 400);
        }
        $dept->delete();
        return response()->json(array(), $status_code = 200);

    }
}
