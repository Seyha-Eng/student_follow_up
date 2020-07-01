@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 bg-white">
            <div class="container mt-3">
                <h2 class="text-center">View Detial Students</h2>
                @csrf
                <div class="card">
                    <div class="card-header text-center">
                        <img src="{{asset('Picture/'.$students->picture)}}" width="100px;" height="100px;">
                    </div>
                    <div class="card-body">
                        <div class="col-3"><p>Username: {{$students->firstname}} {{$students->lastname}}</p></div>
                        <div class="col-3"> <p>Class: {{$students->class}}</p></div>
                        <div class="col-3"> <p>Description: {{$students->description}}</p></div>
                    </div>
                </div><br>
            
                <form action="{{route('addComment',$students->id)}}" method="POST">
                    @csrf 
                    <div class="form-group">
                        <label>Comment:</label>
                        <textarea class="form-control" name="comment" id="comment" cols="150" rows="3" placeholder="Write comment..."></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
                <br>
                
                    @foreach ($students->comments as $item)
                    <strong>{{$item->user->firstname}}</strong> {{$item->created_at}}
                        <textarea class="form-control" name="comment" id="comment" cols="150" rows="3" disabled selected >{{$item->comment}}</textarea>
                        @if (Auth::user() && (Auth::user()->id == $item->user_id)) 
                                
                                  <a href="" data-toggle="modal" data-target="#Modal{{$item->id}}" method="post">Edit</a>
                                  <div class="modal" id="Modal{{$item->id}}">
                                      <div class="modal-dialog">
                                      <div class="modal-content">
                                          
                                          <div class="modal-header text-center">
                                          <h2 class="modal-title">Edit Comment</h2>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          </div>
                                       
                                          <div class="modal-body">
                                              <form action="{{route("updateComments",$item->id)}}" method="post" enctype="multipart/form-data" >
                                                  @csrf
                                                  @method('put')
                                                  <div class="form-group">
                                                  <label for="comment">Comments:</label>
                                                  <textarea name="comment" id=""  class="form-control" cols="10" rows="5">{{$item->comment}}</textarea>
                                                  </div>
                                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                                  <button type="button" class="btn btn-danger btn-right" data-dismiss="modal">Close</button>
                                              </form>
                                          </div>
                                      </div>
                                      </div>
                                  </div>
                             
                      
                                  <a onclick="document.getElementById('{{'comment'.$item->id}}').submit()" href="#">delete</i></a><br>
                                  <form id="{{'comment'.$item->id}}" action="{{route('deleteComments',$item->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                  </form>
                        
                        @endif
                    @endforeach
               
            </div>      
        </div>
    </div>
</div>
@endsection