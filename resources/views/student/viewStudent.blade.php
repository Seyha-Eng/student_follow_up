{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
   <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
    <div class="container mt-5">
        <div class="col-12">
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
</html> --}}