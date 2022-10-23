@extends('crud.customer.templete')

@section('data')
    <div class="data_section">
        @if(session('success'))
        <div class="successMassage">{{session('success')}}</div> 
        @endif
        <h2>All Customer</h2>
        @if(count($customers) == 0)
            <div><p class="alert-danger">Customer list is empty. <a href="{{route('customer.create')}}">Add Custormer<a></p></div>
        @else
        <table class="all_data">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Mail</th>
                <th>Gender</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
            @foreach($customers as $customer)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->gender}}</td>
                    <td>{{$customer->contact}}</td>
                    <td>
                        <form action="{{route('customer.show', $customer->id)}}" method="GET" class="action" >
                            <button type="submit" class="view_btn btn">View</button>
                        </form>
                        <form action='{{url("/customer/{$customer->id}/edit")}}' method="GET" class="action">
                            <button type="submit" class="edit_btn btn">Edit</button>
                        </form>
                        <button id="confirm_delete" class="delete_btn btn">Delete</button>
                        <form action="{{route('customer.destroy',$customer->id)}}" method="POST" class="action" id="deleteform">
                            @method('delete')
                            <input type="hidden" name="_token" value={{csrf_token()}}>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        @endif
    </div>
@endsection

@section('script')
    <script>
       ;(function($){
        $(document).ready(function(){
            $('#confirm_delete').on('click', function(){
                if(confirm("Are you sure to delete?")){
                    $('#deleteform').submit();
                }
            });
        });
       })(jQuery);
    </script>
@endsection