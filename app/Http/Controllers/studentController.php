<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $students = Student::all();
        // return view('home',compact('students'));
    }
    public function return_followup()
    {
        $students = Student::all();
        return view('outfollowup',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('student.addStudent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $students = new Student;
        $students -> firstname=$request->get('firstname');
        $students -> lastname=$request->get('lastname');
        $students -> class=$request->get('class');
        $students -> description=$request->get('description');
        $students -> picture=$request->get('Picture');
        $students -> activeFollowup = 1 ;
        $students ->save();
        return redirect('student');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.editStudent', compact('student'));
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
        //
        $student = Student::find($id);
        $student -> firstname=$request->get('firstname');
        $student -> lastname=$request->get('lastname');
        $student -> class=$request->get('class');
        $student -> description= $request->get('description');
        $student -> picture=$request->get('Picture');
      
        $student ->save();
        // return redirect('students');
        return redirect('student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
