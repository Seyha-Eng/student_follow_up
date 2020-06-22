<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="container">
    <form action="{{route('student.update',$student->id)}}" method="POST" >
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Firstname</label>
            <input type="text" name="firstname"  placeholder="firstname" value="{{$student->firstname}}">
        </div>
        <div class="form-group">
            <label for="">lastname</label>
            <input type="text" name="lastname"  placeholder="lastname" value="{{$student->lastname}}">
        </div>
        <div class="form-group">
            <label for="">Class</label>
            <input type="text" name="class" placeholder="class" value="{{$student->class}}">
        </div>
        <div class="form-group">
            <label for="">Decription</label>
            <input type="text" name="description" placeholder="description" value="{{$student->description}}">
        </div>
        <div class="form-group">
            <label for="">Picture</label>
            <input type="text" name="picture" placeholder="picture" value="{{$student->picture}}">
        </div>
        <button type="submit" class="btn btn-success">Edit</button>
    </form>
</div>