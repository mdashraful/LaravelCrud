@extends('crud.customer.templete')

@section('data')
    <div class="form_section">
        @if(session('success'))
                <div class="successMassage">{{session('success')}}</div>
        @endif
            
        <h2>Update Customer Info.</h2>
        <form class="add_form" action="{{route('customer.update', $customer->id)}}" method="POST">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li style="list-style-type:none; color:red">{{ "* ".$error }}</li>
                        @endforeach  
                    </ul> 
                </div>
            @endif

            {{csrf_field()}}
            @method('put')
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{$customer->name}}">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{$customer->email}}">
            <label for="contact">Contact:</label>
            <input type="text" name="contact" id="contact" value="{{$customer->contact}}">
            <p>Gender:</p>
            <input type="radio" id="male" name="gender" value="male" {{$customer->gender=='male'?'checked':''}}>
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="female" {{$customer->gender=='female'?'checked':''}}>
            <label for="female">Female</label><br>
            <button class="btn submit_btn" type="submit" style="margin-top: 15px">Update</button>
        </form>
    </div>
@endsection