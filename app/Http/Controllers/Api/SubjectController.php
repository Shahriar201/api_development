<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subject = Subject::all();
        return response()->json($subject);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'class_id' => 'required',
            'subject_name' => 'required|unique:subjects|max:255',
            'subject_code' => 'required|unique:subjects|max:255',
        ]);
        $subject = Subject::create($request->all());
        // return response()->json($subject);
        return response('Inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub = Subject::findorfail($id);
        return response()->json($sub);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subject = Subject::findorfail($id);
        $subject->update($request->all());
        return response('Data Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subject::where('id', $id)->delete();
        return response('Data deleted');
    }
}
