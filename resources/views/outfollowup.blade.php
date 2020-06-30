
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
            <a class="nav-link " href="home">Follow Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Out Of Followup</a>
          </li>
          
        </ul> <br>
            <table class="table table-bordered">
                <tr>
                    <th>Picture</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Class</th>
                   
                    <th>Action</th>
                </tr>

                @foreach ($students as $student)
                @if($student -> activeFollowup == 0 )

                
                <tr>
                    <td><img src="{{asset('Picture/'.$student->picture)}}" width="100px;" height="100px;"></td>
                    <td>{{$student->firstname}}</td>
                    <td>{{$student->lastname}}</td>
                    <td>{{$student->class}}</td>
                  
                    <td>
                        <a href="{{route('backfollowup',$student->id)}}"><button class="btn btn-primary">Back</button></a>
                       
                        
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