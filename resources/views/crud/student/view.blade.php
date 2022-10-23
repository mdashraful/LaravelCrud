@extends('crud.student.templete')

@section('data')

<div class="view_section">
    <h2>View</h2>
    <div class="view_data">
        <h4 style="text-align: center">#Unique Id: {{$student->unique_id}}</h4>
        <hr>
        <p>Name: {{$student->name}}</p>
        <p>Gender: {{ucwords($student->gender)}}</p>
        <p>Contact: {{$student->contact}}</p>
    </div>    
</div>

@endsection