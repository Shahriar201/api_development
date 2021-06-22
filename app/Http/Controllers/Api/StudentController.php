<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Student;
use Illuminate\Support\Facades\Hash;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $student = Student::all();
        $student = DB::table('students')->get();
        return response()->json($student);
    }

    public function store(Request $request)
    {
        $data = array();
        $data['class_id'] = $request->class_id;
        $data['section_id'] = $request->section_id;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['password'] =  Hash::make($request->password);
        $data['address'] = $request->address;
        $data['gender'] = $request->gender;
        $data['image'] = $request->image;
        DB::table('students')->insert($data);
        return response('Data inserted');
        // $student = Student::create($request->all());
        // return response('Inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = DB::table('students')->where('id', $id)->first();
        // $student = Student::findorfail($id);
        return response()->json($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['class_id'] = $request->class_id;
        $data['section_id'] = $request->section_id;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['password'] =  Hash::make($request->password);
        $data['address'] = $request->address;
        $data['gender'] = $request->gender;
        $data['image'] = $request->image;
        DB::table('students')->where('id', $id)->update($data);
        return response('Data updated');
    }

    public function destroy($id)
    {
        $img = DB::table('students')->where('id', $id)->first();
        $image_path = $img->image;

        // unlink($image_path);
        DB::table('students')->where('id', $id)->delete();
        return response('Data deleted');
    }
}
