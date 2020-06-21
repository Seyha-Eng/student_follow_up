
@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div class="container mt-5">
      <div class="col-12">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">Followup</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="return_followup">Out of Followup</a>
          </li>
          
        </ul> <br>
            <a href="{{route('student.create')}}"><button class="btn btn-primary">add student</button></a>
            <table class="table table-bordered">
                <tr>
                    <th>Picture</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Class</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>

                @foreach ($students as $student)
                @if($student -> activeFollowup == 1 )

                
                <tr>
                    <td>{{$student->picture}}</td>
                    <td>{{$student->firstname}}</td>
                    <td>{{$student->lastname}}</td>
                    <td>{{$student->class}}</td>
                    <td>{{$student->description}}</td>
                    <td>
                        {{-- <a href="{{route('student.edit',$student->id)}}"><button><i class='fas fa-pen' style="color: teal"></i></button></a> --}}
                        <a href="{{route('student.edit',$student->id)}}">Edit</a>
                    </td>
                </tr>
                
                @endif
                @endforeach

                
            </table>
        </div>
    </div>
</body>
</html>
@endsection 