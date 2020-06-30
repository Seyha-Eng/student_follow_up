<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use Illuminate\Support\Facades\Auth;
use Image;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('home',compact('students'));
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
        // $students -> picture=$request->get('Picture');
        if ($request->hasfile('picture')){
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). ".".$extension;
            $file->move('picture/', $filename);
            $students->picture = $filename;
            $students->save();
        }
        $students -> activeFollowup = 1 ;
        $students ->save();
        return redirect('home');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students=Student::find($id);
        return view('detailStudent',compact('students'));
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
        $users=User::find(Auth::id());
        $students = Student::find($id);
        $students -> firstname=$request->get('firstname');
        $students -> lastname=$request->get('lastname');
        $students -> class=$request->get('class');
        $students -> description=$request->get('description');
        $students -> picture=$request->get('Picture');
        if ($request->hasfile('picture')){
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). ".".$extension;
            $file->move('picture/', $filename);
            $students->picture = $filename;
            $students->save();
        }
        $students -> activeFollowup = 1 ;
        $students ->save();
        return redirect('home');
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
    public function outfollowup($id)
    {
        $students = Student::find($id);
        $students -> activeFollowup = 0;
        $students -> save();
        return redirect('/return_followup');
    }
    // public function followup($id)
    // {
    //     $students = Student::find($id);
    //     $students -> activeFollowup = 1;
    //     $students -> save();
    //     return redirect('/home');
    // }

    }
