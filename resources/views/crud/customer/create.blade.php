@extends('crud.customer.templete')

@section('data')
    <div class="form_section">
        <h2>Add New Customer</h2>
        <form class="add_form" action="{{route('customer.store')}}" method="POST">
            
            {{(csrf_field())}}
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{old('name')}}">
            @error('name')
                <p class="alert-danger">{{ "* ".$message }}</p>
            @enderror
            <label for="email">Mail:</label>
            <input type="email" name="email" id="email" value="{{old('email')}}">
            @error('email')
                <p class="alert-danger">{{ "* ".$message }}</p>
            @enderror
            <label for="contact">Contact:</label>
            <input type="text" name="contact" id="contact" value="{{old('contact')}}">
            @error('contact')
                <p class="alert-danger">{{ "* ".$message }}</p>
            @enderror
            <p>Gender:</p>
            <input type="radio" id="male" name="gender" value="male" {{ old('gender') == 'male'?'checked':'' }}>
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="female" {{ old('gender') == 'female'?'checked':'' }}>
            <label for="female">Female</label><br>
            @error('gender')
                <p class="alert-danger">{{ "* ".$message }}</p>
            @enderror
            <button class="btn submit_btn" type="submit" style="margin-top: 15px">Add Customer</button>
        </form>
    </div>
@endsection