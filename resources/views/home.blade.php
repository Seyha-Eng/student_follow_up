@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Class</th>
            <th scope="col">Picture</th>
            <th scope="col">activeFollowup</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Seyha</td>
            <td>Eng</td>
            <td>WEP-A</td>
            <td>No</td>
            <td>No</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Lo</td>
            <td>Li</td>
            <td>WEP-B</td>
            <td>No</td>
            <td>No</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>City</td>
            <td>Sydney</td>
            <td>WEP-A</td>
            <td>No</td>
            <td>No</td>
          </tr>
          
        </tbody>
</div>
@endsection
