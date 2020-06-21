@extends('layouts.app')
@section('content')
<div class="container mt-3">
        <ul class="nav nav-tabs nav-justified">
          <li class="nav-item">
            <a class="nav-link active" href="#">Follow Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('students.index')}}">Out of Followup</a>
          </li>
        </ul><br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Add New Student
          </button>
        
          <!-- The Modal -->
          <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <img style="width: 50px; height:50px;" src="img/student.png" class="img-fluid rounded-circle"> <h4 class="modal-title">Add New Student</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control" placeholder="Firstname" name="firstName" required autocomplete="firstName">
                            </div>
                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control" placeholder="Lastname" name="lastName" required autocomplete="lastName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <select class="form-control" name="class">
                                    <option selected disabled>Class</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="SNA">SNA</option>
                                    <option value="Web Programming">Web Programming</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input id="picture" type="file" class="form-control" name="image" required autocomplete="picture">
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="tutor">
                                    <option selected disabled>Tutor</option>
                                   @foreach($users as $user)
                                        @if($user->role== 0)
                                            <option value="{{$user->id}}">{{$user->firstName." ".$user->lastName}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <div>
                               <textarea rows="5" class="form-control" placeholder="Description" name="description"></textarea>
                            </div><br>
                        <div class="form-group mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary float-right">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <table class="table table-bordered">
                <tr>
                    <th>Picture</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Classs</th>
                    <th>Action</th>
                </tr>
                @foreach($students as $student)
                    @if($student->activeFollowup == 1)
                        
                    <tr>
                        <td><img style="width: 50px; height:50px;" src="{{asset('img/'.$student->picture)}}" class="img-fluid rounded-circle"></td>
                        <td>{{$student->firstName}}</td>
                        <td>{{$student->lastName}}</td>
                        <td>{{$student->class}}</td>
                        <td>
                            <a href="{{route('students.edit', $student->id)}}"><i class='fas fa-user-edit'>EDIT</i></a>&nbsp; | &nbsp;
                            <a href=""><i class='fas fa-user-alt-slash text-success'></i>DELETEz</a>
                        </td>
                        @endif
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection