@extends('crud.teacher.templete')

@section('data')

<div class="view_section">
    <h2>View</h2>
    <div class="view_data">
        <h4 style="text-align: center">#Unique Id: {{$teacher->unique_id}}</h4>
        <hr>
        <p>Name: {{$teacher->name}}</p>
        <p>Gender: {{ucfirst($teacher->gender)}}</p>
        <p>Contact: {{$teacher->contact}}</p>
    </div>    
</div>

@endsection