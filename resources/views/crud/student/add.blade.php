@extends('crud.student.templete')

@section('data')
    <div class="form_section">
        <h2>Add New Student</h2>
        <form class="add_form" action="{{route('student.store')}}" method="POST">
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
            <input type="text" name="name" id="name" required>
            <label for="uniqueId">Unique Id:</label>
            <input type="text" name="uniqueId" id="uniqueId" required>
            <label for="contact">Contact:</label>
            <input type="text" name="contact" id="contact" required>
            <p>Gender:</p>
            <input type="radio" id="male" name="gender" value="Male" required>
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="Female" required>
            <label for="female">Female</label><br>
            <button class="btn submit_btn" type="submit" style="margin-top: 15px">Add Student</button>
        </form>
    </div>
@endsection