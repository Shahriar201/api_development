<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Model\Class;
use DB;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = DB::table('classes')->get();
        return response()->json($class);
        // return Class::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'class_name' => 'required|unique:classes|max:255',
        ]);
        $data = array();
        $data['class_name'] = $request ->class_name;
        DB::table('classes')->insert($data);
        return response('done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = DB::table('classes')->where('id', $id)->first();
        return response()->json($show);
    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['class_name'] = $request ->class_name;
        DB::table('classes')->where('id', $id)->update($data);
        return response('updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('classes')->where('id', $id)->delete();
        return response('deleted');
    }
}
