@extends('crud.teacher.templete')

@section('data')
    <div class="form_section">
        <h2>Update Teacher Info.</h2>
        <form class="add_form" action="{{route('teacher.update')}}" method="POST">
            @if($errors->any())
                <div class="alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li style="list-style-type:none; color:red">{{ "* ".$error }}</li>
                        @endforeach  
                    </ul> 
                </div>
            @endif
            {{csrf_field()}}
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{$teacher->name}}">
            <label for="uniqueId">Unique Id:</label>
            <input type="text" name="uniqueId" id="uniqueId" value="{{$teacher->unique_id}}">
            <label for="contact">Contact:</label>
            <input type="text" name="contact" id="contact" value="{{$teacher->contact}}">
            <p>Gender:</p>
            <input type="radio" id="male" name="gender" value="male" {{$teacher->gender=='male'?'checked':''}}>
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="female" {{$teacher->gender=='female'?'checked':''}}>
            <label for="female">Female</label><br>
            <input type="hidden" name="id" value="{{$teacher->id}}">
            <button class="btn submit_btn" type="submit" style="margin-top: 15px">Update</button>
        </form>
    </div>
@endsection