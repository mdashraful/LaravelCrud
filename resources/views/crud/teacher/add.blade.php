@extends('crud.teacher.templete')

@section('data')
    <div class="form_section">
        <h2>Add New Teacher</h2>
        <form class="add_form" action="{{route('teacher.store')}}" method="POST">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li style="list-style-type:none; color:red">{{ "* ".$error }}</li>
                    @endforeach  
                    </ul>      
                </div>
            @endif
            {{(csrf_field())}}
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            <label for="uniqueId">Unique Id:</label>
            <input type="text" name="uniqueId" id="uniqueId" value="{{ old('uniqueId')}}">
            <label for="contact">Contact:</label>
            <input type="text" name="contact" id="contact" value="{{ old('contact')}}">
            <p>Gender:</p>
            <input type="radio" id="male" name="gender" value="male" {{ old('gender') == 'male'?'checked':'' }}>
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="female" {{ old('gender') == 'female'?'checked':'' }}>
            <label for="female">Female</label><br>
            <button class="btn submit_btn" type="submit" style="margin-top: 15px">Add Teacher</button>
        </form>
    </div>
@endsection