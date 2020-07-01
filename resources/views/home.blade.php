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
            <a class="nav-link active" href="#">Follow Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="return_followup">Out Of Followup</a>
          </li>
          
        </ul> <br>
            {{-- Modal for add new students --}}
            <a href="" data-toggle="modal" data-target="#myModal"><button class="btn btn-primary">add student</button></a>
            <!-- The Modal -->
                <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Student</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="firstName" type="text" class="form-control" placeholder="Firstname" name="firstname" required autocomplete="firstName">
                                </div>
                                <div class="col-md-6">
                                    <input id="lastName" type="text" class="form-control" placeholder="Lastname" name="lastname" required autocomplete="lastName">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <select class="form-control" name="class">
                                        <option selected disabled>Class</option>
                                        <option selected disabled>Class</option>
                                        <option value="A">2020A</option>
                                        <option value="B">2020B</option>
                                        <option value="C">2020C</option>
                                        <option value="SNA">SNA</option>
                                        <option value="Web">WEP</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input id="picture" type="file" class="form-control" name="picture" required autocomplete="picture">
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" name="tutor">
                                        <option selected disabled>Tutor</option>
                                        @foreach ($user as $item)
                                    <option value="{{$item->id}}">{{$item->firstname}}.{{$item->lastname}}</option>
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

            {{-- table to display all students followup --}}
            <table class="table table-bordered">
                <tr>
                    <th>Picture</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Class</th>
                    <th class="text-center">Action</th>
                    {{-- <th>Description</th> --}}
                </tr>

                @foreach ($students as $student)
                @if($student -> activeFollowup == 1 )

                
                <tr>
                    <td><img style="width: 50px;height:50px" src="{{asset('picture/'.$student->picture)}}"></td>
                    <td>{{$student->firstname}}</td>
                    <td>{{$student->lastname}}</td>
                    <td>{{$student->class}}</td>
                    {{-- <td>{{$student->description}}</td> --}}
                    <td>
                    {{-- Modal for add edit students --}}
                    
                    <a href="" data-toggle="modal" data-target="#myModals{{$student->id}}" ><button class="btn btn-primary">Edit</button></a>
                        <!-- The Modal -->
                      
                            
                        {{-- @endforeach --}}
                    <div class="modal fade" id="myModals{{$student->id}}">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                      <div class="modal-header">
                        {{-- <img style="width: 50px; height:50px;" src="img/student.png" class="img-fluid rounded-circle"> <h4 class="modal-title">Add New Student</h4> --}}
                        <img style="width: 50px; height:50px;" src="{{asset('Picture/'.$student->picture)}}" class="img-fluid rounded-circle"> <h4 class="modal-title">Edit Student</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      
                      <!-- Modal body -->
                      <div class="modal-body">
                          <form method="POST" action="{{ route('student.update', $student->id) }}" enctype="multipart/form-data">
                              @csrf
                              @method("PATCH")
                              <div class="form-group row">
                                  <div class="col-md-6">
                                  <input id="firstName" type="text" class="form-control" value="{{$student->firstname}}" placeholder="Firstname" name="firstname" required autocomplete="firstName">
                                  </div>
                                  <div class="col-md-6">
                                      <input id="lastName" type="text" class="form-control" value="{{$student->lastname}}" placeholder="Lastname" name="lastname" required autocomplete="lastName">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-md-4">
                                      <select class="form-control" name="class" >
                                          <option selected disabled>Class</option>
                                          <option value="A">2020A</option>
                                          <option value="B">2020B</option>
                                          <option value="C">2020C</option>
                                          <option value="SNA">SNA</option>
                                          <option value="Web">WEP</option>
                                      </select>
                                  </div>
                                  <div class="col-md-4">
                                      <input id="picture" type="file" class="form-control" value="{{$student->Picture}}" name="picture" required autocomplete="picture">
                                  </div>
                                  <div class="col-md-4">
                                      <select class="form-control" name="tutor">
                                          <option selected disabled>Tutor</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                      </select>
                                  </div>
                              </div>
                                  <div>
                                     <textarea rows="5" class="form-control" placeholder="Description" name="description">{{$student->description}}</textarea>
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
                    <a href="{{route('student.show',$student->id)}}"><button class="btn btn-primary">View</button></a>
                    <a href="{{route('outfollowup',$student->id)}}"><button class="btn btn-primary">Remove</button></a>
                
                @endif
                @endforeach
                
            </table>
        </div>
    </div>
</body>
</html>
@endsection 
