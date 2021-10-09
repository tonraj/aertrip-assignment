<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employ as EmployModel;
use App\Models\Contact;
use App\Models\Address;

class Employ extends Controller
{

    function search (Request $request){

        $depts = new EmployModel;

        if($request->get('q') != null){
            $depts = $depts->where('name', 'like', $request->get('q'));
        }

        $depts = $depts->with("contacts")->with("addresses")->with("department");

        return $depts->simplePaginate(10);
    }

    function add (Request $request){

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'department_id' => 'required|exists:departments,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), $status_code = 400);
        }

        EmployModel::create($validator->validated());

        return response()->json(array(), $status_code = 201);
    }

    function edit (Request $request, $id){
        $dept = EmployModel::find($id);

        if($dept == null){
            return response()->json(array("error" => "Employ not found."), $status_code = 400);
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

        $dept = EmployModel::find($id);

        if($dept == null){
            return response()->json(array("error" => "Employ not found."), $status_code = 400);
        }

        $dept->delete();
        return response()->json(array(), $status_code = 200);

    }



    function add_contact (Request $request){

        $validator = \Validator::make($request->all(), [
            'phone_no' => 'required|max:10|min:10',
            'employ_id' => 'required|exists:employs,id',
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), $status_code = 400);
        }

        $e = Contact::create($validator->validated());
        return response()->json($e->toArray(), $status_code = 201);

    }


    function add_address (Request $request){

        $validator = \Validator::make($request->all(), [
            'address' => 'required|min:5',
            'employ_id' => 'required|exists:employs,id',
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), $status_code = 400);
        }

        $e = Address::create($validator->validated());
        return response()->json($e->toArray(), $status_code = 201);

    }



    function edit_contact (Request $request, $id){


        $dept = Contact::find($id);

        if($dept == null){
            return response()->json(array("error" => "Contact not found."), $status_code = 400);
        }

        $validator = \Validator::make($request->all(), [
            'phone_no' => 'required|max:10|min:10'
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), $status_code = 400);
        }

        $dept->phone_no = $validator->validated()['phone_no'];
        $dept->save();

        return response()->json($dept->toArray(), $status_code = 200);

    }


    function edit_address (Request $request, $id){

        $dept = Address::find($id);

        if($dept == null){
            return response()->json(array("error" => "Address not found."), $status_code = 400);
        }

        $validator = \Validator::make($request->all(), [
            'address' => 'required|min:5'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), $status_code = 400);
        }

        $dept->address = $validator->validated()['address'];
        $dept->save();

        return response()->json($dept->toArray(), $status_code = 200);

    }

    function delete_contact ( $id){

        $dept = Contact::find($id);
        if($dept == null){
            return response()->json(array("error" => "Contact not found."), $status_code = 400);
        }
        $dept->delete();
        return response()->json(array(), $status_code = 200);

    }


    function delete_address ( $id){

        $dept = Address::find($id);
        if($dept == null){
            return response()->json(array("error" => "Address not found."), $status_code = 400);
        }
        $dept->delete();
        return response()->json(array(), $status_code = 200);

    }

}
