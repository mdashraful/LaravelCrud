@extends('crud.customer.templete')

@section('data')

<div class="view_section">
    <h2>View</h2>
    <div class="view_data">
        <h4 style="text-align: center">#Name: {{$customer->name}}</h4>
        <hr>
        <p>Email: {{$customer->email}}</p>
        <p>Contact: {{$customer->contact}}</p>
        <p>Gender: {{ucfirst($customer->gender)}}</p>
    </div>    
</div>

@endsection